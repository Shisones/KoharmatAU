document.addEventListener("DOMContentLoaded", (event) => {
  var id = 1;

  // Function to add a new node
  function addNode(event) {
    const currentButton = this;
    const nodePredecessor = this.parentNode.getAttribute(
      "data-node-predecessor"
    );
    const nodeContainer = document.getElementById(
      `add-node-${nodePredecessor}`
    );
    let itemParentNode = nodeContainer.parentNode;

    let childNodeForm = document.createElement("li");
    childNodeForm.setAttribute("data-predecessor", nodePredecessor);
    childNodeForm.setAttribute("data-node-id", id);
    childNodeForm.setAttribute("id", `node-item-${id}`);
    childNodeForm.innerHTML = nodeAddView(csrf, id, nodePredecessor);
    itemParentNode.appendChild(childNodeForm);

    // Add event listener to the new button
    childNodeForm
      .querySelector(".add-node-btn")
      .addEventListener("click", addNode);
    childNodeForm.querySelector(".save-btn").addEventListener("click", () => {
      document.querySelectorAll(".add-node-btn").forEach((button) => {
        button.disabled = false;
      });
    });
    itemParentNode.appendChild(nodeContainer);

    childNodeForm
      .querySelector("form")
      .addEventListener("submit", async function (event) {
        event.preventDefault();
        const resultSubmit = await ajaxSubmitForm(this);
        if (resultSubmit.code == 201) {
          alert("Berhasil menambahkan anggota");

          const formData = new FormData(this);
          const newNode = document.createElement("li");
          newNode.innerHTML = nodeDefaultView(
            id,
            resultSubmit.img_path,
            formData.get("node_nama")
          );
          itemParentNode.replaceChild(newNode, childNodeForm);
          attachEventListeners(newNode);
        }
      });

    id += 1;

    document.querySelectorAll(".add-node-btn").forEach((button) => {
      button.disabled = true;
    });

    refreshScript(inputImagePreviewScript);
  }

  // Attach the event listener to the existing button(s)
  document.querySelectorAll(".add-node-btn").forEach((button) => {
    button.addEventListener("click", addNode);
  });

  document.querySelectorAll(".save-btn").forEach((button) => {
    button.addEventListener("click", () => {
      document.querySelectorAll(".add-node-btn").forEach((button) => {
        button.disabled = false;
      });
    });
  });
  function attachEventListeners(nodeElement) {
    nodeElement
      .querySelector(".add-node-btn")
      .addEventListener("click", addNode);
    // Add other event listeners if needed, e.g., edit and delete buttons
    const editButton = nodeElement.querySelector(
      `#button-edit-${nodeElement.getAttribute("data-node-id")}`
    );
    const deleteButton = nodeElement.querySelector(
      `#button-delete-${nodeElement.getAttribute("data-node-id")}`
    );
    if (editButton) {
      editButton.addEventListener("click", editNode);
    }
    if (deleteButton) {
      deleteButton.addEventListener("click", deleteNode);
    }
  }
});

function nodeAddView(csrf, id, nodePredecessor) {
  return `
    <form action="/CRUD/strukturorganisasi/addNode" method="POST">
      <div class="tree-node d-flex align-items-center">
        ${csrf}
        <input type="hidden" name="node_id" value="${id}">
        <input type="hidden" name="node_predecessor" value="${nodePredecessor}">
        <input type="hidden" name="node_link" value="#">
            <span>
            <label for="input-image" style="height:100px;width:100px;border:1px dashed;" id="input-image-preview"><i class='bx bxs-image-add fs-1 my-3 py-3 text-primary-color'></i></label>
            <input type="file" accept=".jpg, .jpeg, .png" name="node_img" id="input-image" class="d-none"/>
            </span>
            <span class="tree-text"><input type="text" name="node_nama" class="form-control w-100" placeholder="Masukkan nama"></input></span>
            <button type="submit" class="btn btn-success save-btn mx-2">Simpan</button>
            </div>
        </form>
      <ul>
          <li data-node-predecessor='${id}' id="add-node-${id}">
              <button class="btn btn-primary add-node-btn">Tambah</button>
          </li>
      </ul>
  `;
}

function nodeDefaultView(id, img_path, name) {
  return `
      <div class="tree-node">
        <a href="#">
        <img src="${img_path}" class="tree-image">
        <span class="tree-text">${name}</span>
        </a>
        <button type="button" class="btn btn-primary me-1" title="Edit" id="button-edit-${id}"><i class='bx bx-edit'></i></button>
        <button type="button" class="btn btn-danger me-2" title="Hapus" id="button-delete-${id}"><i class='bx bx-trash' ></i></button>
      </div>
      <ul>
          <li data-node-predecessor='${id}' id="add-node-${id}">
              <button class="btn btn-primary add-node-btn">Tambah</button>
          </li>
      </ul>
  `;
}

function refreshScript(src) {
  // Remove the existing script if it exists
  const existingScript = document.querySelector(`script[src="${src}"]`);
  if (existingScript) {
    existingScript.remove();
  }

  // Create a new script element
  const script = document.createElement("script");
  script.src = src;
  script.type = "text/javascript";

  // Append the new script element to the head
  document.body.appendChild(script);
}

function refreshCSS(href) {
  // Remove the existing script if it exists
  const existingCSS = document.querySelector(`link[href="${href}"]`);
  if (existingCSS) {
    existingCSS.remove();
  }

  // Create a new script element
  const cssScript = document.createElement("link");
  cssScript.href = href;
  cssScript.rel = "stylesheet";

  // Append the new script element to the head
  document.head.appendChild(cssScript);
}

async function ajaxSubmitForm(form) {
  const formData = new FormData(form);
  try {
    const response = await fetch(form.action, {
      method: "POST",
      headers: {
        "X-CSRF-TOKEN": document
          .querySelector('meta[name="csrf-token"]')
          .getAttribute("content"),
      },
      body: formData,
    });
    const data = await response.json();
    if (typeof data.message !== undefined) {
      return data;
    }
  } catch (error) {
    console.error("Error:", error);
    return false;
  }
}
