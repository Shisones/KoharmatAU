document.addEventListener("DOMContentLoaded", (event) => {
  var id = 1;
  if (nodes.length != 0) id = parseInt(nodes[nodes.length - 1].struktur_id) + 1;

  const treeContainer = document.getElementById("tree-root");
  const nodesMap = {};

  // Create a container for the tree structure

  // Function to create a node element
  function createNodeElement(node) {
    const nodeElement = document.createElement("li");
    nodeElement.setAttribute("data-node-id", node.struktur_id);
    nodeElement.setAttribute(
      "data-node-predecessor",
      node.struktur_predecessor
    );
    nodeElement.innerHTML = `
      <div class="tree-node">
        <a href="${node.struktur_link}">
          <img src="/storage/${node.struktur_img}" class="tree-image">
          <span class="tree-text">${node.struktur_nama}</span>
        </a>
      </div>
      <ul id="node-${node.struktur_id}-childs" class="d-none">
      </ul>
    `;

    return nodeElement;
  }

  // Function to append a node to its predecessor
  function appendNode(node) {
    let container;
    const nodeElement = createNodeElement(node);
    nodesMap[node.struktur_id] = nodeElement;

    if (node.struktur_predecessor === "-1") {
      // If the node has no predecessor, append it to the root
      treeContainer.appendChild(nodeElement);
      container = treeContainer;
    } else {
      // Append the node to its predecessor's UL element
      const predecessorElement = nodesMap[node.struktur_predecessor];
      if (predecessorElement) {
        const predecessorChilds = predecessorElement.querySelector(
          `#node-${node.struktur_predecessor}-childs`
        );
        predecessorChilds.classList.remove("d-none");
        predecessorChilds.appendChild(nodeElement);
        container = predecessorChilds;
      }
    }
    return container;
  }

  // Process each node to build the tree
  if (nodes.length != 0) {
    nodes.forEach((node) => {
      appendNode(node);
    });
  }

  // Add event listeners to the buttons
  function addEventListeners() {
    document.querySelectorAll(".add-node-btn").forEach((button) => {
      button.addEventListener("click", addNode);
    });
  }

  // Call the function to add event listeners
  addEventListeners();

  var editStrukturButton = document.getElementById("edit-struktur-button");
  editStrukturButton.addEventListener("click", editStruktur);
  var isEditing = false;

  function editStruktur() {
    if (!isEditing) {
      if (nodes.length === 0) {
        let initAddButton = document.createElement("li");
        initAddButton.setAttribute("data-node-predecessor", "-1");
        initAddButton.setAttribute("id", "add-node--1");
        initAddButton.innerHTML =
          '<button class="btn btn-primary add-node-btn">Tambah</button>';
        treeContainer.appendChild(initAddButton);
        initAddButton
          .querySelector(".add-node-btn")
          .addEventListener("click", addNode);
      } else {
        // Select containers matching the pattern "node-id-childs"
        let nodeContainers = document.querySelectorAll(
          '[id^="node-"][id$="-childs"]'
        );
        nodeContainers.forEach((nodeContainer) => {
          const nodeId = nodeContainer.id.split("node-")[1].split("-childs")[0];
          let treeNodeContainer = nodeContainer
            .closest("li")
            .querySelector(".tree-node");
          if (treeNodeContainer) {
            let editNodeButton = document.createElement("button");
            let deleteNodeButton = document.createElement("button");

            editNodeButton.classList.add("btn");
            editNodeButton.classList.add("btn-primary");
            editNodeButton.classList.add("me-1");
            editNodeButton.setAttribute("type", "Button");
            editNodeButton.setAttribute("title", "Edit");
            editNodeButton.setAttribute("id", `button-edit-${nodeId}`);
            editNodeButton.innerHTML = "<i class='bx bx-edit'></i>";

            deleteNodeButton.classList.add("btn");
            deleteNodeButton.classList.add("btn-danger");
            deleteNodeButton.classList.add("me-2");
            deleteNodeButton.setAttribute("type", "Button");
            deleteNodeButton.setAttribute("title", "Hapus");
            deleteNodeButton.setAttribute("id", `button-delete-${nodeId}`);
            deleteNodeButton.innerHTML = "<i class='bx bx-trash'></i>";

            editNodeButton.addEventListener("click", editNode);
            deleteNodeButton.addEventListener("click", deleteNode);

            treeNodeContainer.appendChild(editNodeButton);
            treeNodeContainer.appendChild(deleteNodeButton);
          }
          let addButton = document.createElement("li");
          addButton.setAttribute("data-node-predecessor", nodeId);
          addButton.setAttribute("id", `add-node-${id}`);
          addButton.innerHTML = `
            <button class="btn btn-primary add-node-btn">Tambah</button>
          `;
          nodeContainer.classList.remove("d-none");
          nodeContainer.appendChild(addButton);
          addButton
            .querySelector(".add-node-btn")
            .addEventListener("click", addNode);
        });
        let addButton = document.createElement("li");
        addButton.setAttribute("data-node-predecessor", -1);
        addButton.setAttribute("id", `add-node--1`);
        addButton.innerHTML = `
          <button class="btn btn-primary add-node-btn">Tambah</button>
        `;
        treeContainer.appendChild(addButton);
        addButton
          .querySelector(".add-node-btn")
          .addEventListener("click", addNode);
      }
      editStrukturButton.innerHTML = "Selesai";
      isEditing = true;
    } else {
      let nodeContainers = document.querySelectorAll(
        '[id^="node-"][id$="-childs"]'
      );
      nodeContainers.forEach((nodeContainer) => {
        const nodeId = nodeContainer.id.split("node-")[1].split("-childs")[0];
        let treeNodeContainer = nodeContainer
          .closest("li")
          .querySelector(".tree-node");
        if (treeNodeContainer) {
          let treeNodeButtons = treeNodeContainer.querySelectorAll("button");
          treeNodeButtons.forEach((button) => {
            treeNodeContainer.removeChild(button);
          });
        }
        let buttonContainer =
          nodeContainer.querySelectorAll('[id^="add-node-"]');
        buttonContainer.forEach((container) => {
          container.remove();
        });
        if (nodeContainer.childElementCount === 0) {
          nodeContainer.classList.add("d-none");
        }
      });
      let treeButtonContainer =
        treeContainer.querySelectorAll('[id^="add-node-"]');
      treeButtonContainer.forEach((container) => {
        container.remove();
      });
      editStrukturButton.innerHTML = "Edit";
      isEditing = false;
    }
  }

  // Function to add a new node
  function addNode(event) {
    const currentButton = this;
    const nodePredecessor = this.parentNode.getAttribute(
      "data-node-predecessor"
    );
    const nodeContainer = this.parentNode; //li
    let itemParentNode = nodeContainer.parentNode; //ul

    let childNodeForm = document.createElement("li");
    childNodeForm.setAttribute("data-node-predecessor", nodePredecessor);
    childNodeForm.setAttribute("data-node-id", id);
    childNodeForm.setAttribute("id", `node-item-${id}`);
    childNodeForm.innerHTML = nodeAddView(csrf, id, nodePredecessor);
    itemParentNode.appendChild(childNodeForm);

    let canceled = false;
    childNodeForm.querySelector(".cancel-btn").addEventListener("click", () => {
      document.querySelectorAll(".add-node-btn").forEach((button) => {
        button.disabled = false;
      });
      document.querySelectorAll('[id^="button-delete-"]').forEach((button) => {
        button.disabled = false;
      });
      document.querySelectorAll('[id^="button-edit-"]').forEach((button) => {
        button.disabled = false;
      });
      childNodeForm.remove();
      canceled = true;
    });
    childNodeForm
      .querySelector(".add-node-btn")
      .addEventListener("click", addNode);
    childNodeForm.querySelector(".save-btn").addEventListener("click", () => {
      document.querySelectorAll(".add-node-btn").forEach((button) => {
        button.disabled = false;
      });
      document.querySelectorAll('[id^="button-delete-"]').forEach((button) => {
        button.disabled = false;
      });
      document.querySelectorAll('[id^="button-edit-"]').forEach((button) => {
        button.disabled = false;
      });
    });
    itemParentNode.appendChild(nodeContainer);

    if(!canceled){
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
            id += 1;
          }
        });
    }

    document.querySelectorAll(".add-node-btn").forEach((button) => {
      button.disabled = true;
    });
    document.querySelectorAll('[id^="button-delete-"]').forEach((button) => {
      button.disabled = true;
    });
    document.querySelectorAll('[id^="button-edit-"]').forEach((button) => {
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
      '[id^="button-edit"]'
    );
    const deleteButton = nodeElement.querySelector(
      '[id^="button-delete"]'
    );
    if (editButton) {
      editButton.addEventListener("click", editNode);
    }
    if (deleteButton) {
      deleteButton.addEventListener("click", deleteNode);
    }
  }

  function editNode() {
    console.log("edit");
  }

  async function deleteNode() {
    const currentButton = this;
    const nodeContainer = currentButton.parentNode.parentNode;
    const nodeId = this.id.split("button-delete-")[1];
    let confirmDelete = confirm("Yakin ingin menghapus anggota? semua anggota di bawah anggota ini akan ikut dihapus!");
    if(confirmDelete){
      const deleteSuccess = await ajaxDeleteNode(nodeId);
      if(deleteSuccess){
        alert("Berhasil menghapus anggota");
        nodeContainer.remove();
      }
      else{
        return 0;
      }
    }
  }

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
            <button type="submit" class="btn btn-success save-btn ms-2 me-1">Simpan</button>
            <button type="cancel" class="btn btn-danger cancel-btn me-2">Batal</button>
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
      <ul id="node-${id}-childs">
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

  async function ajaxDeleteNode(id) {
    let token = $("meta[name='csrf-token']").attr("content");
    return new Promise((resolve, reject) => {
      $.ajax({
        url: `/CRUD/strukturorganisasi/deleteNode/${id}`,
        type: "DELETE",
        data: {
          _token: token,
        },
        success: function (response) {
          if (response.code === 201) {
            resolve(response);
          } else {
            reject(false);
          }
        },
        error: function (error) {
          reject(error);
        },
      });
    });
  }
});
