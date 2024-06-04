document.addEventListener("DOMContentLoaded", (event) => {
    // Add event listeners to all reply buttons
    document.querySelectorAll(".reply-btn").forEach((button) => {
      button.addEventListener("click", function () {
        const messageId = this.getAttribute("data-message-id");
        const container = document.getElementById(`reply-form-container-${messageId}`);
  
        if (!container.querySelector("form")) {
          // Create and append the reply form
          const form = document.createElement("form");
          form.setAttribute("action", "/admin/kirimbalasan");
          form.setAttribute("method", "POST");
          form.setAttribute("class", "php-email-form");
          form.setAttribute("role", "form");
          form.innerHTML = `
            <div class="form-group">
                ${csrf}
                <input type="hidden" name="pesan_id" value="${messageId}">
                <textarea id="reply-${messageId}" class="form-control" name="balasan_isi" rows="3" placeholder="Masukkan balasan"></textarea>
            </div>
            <div class="my-3">
              <div class="loading d-none">Loading</div>
              <div class="error-message"></div>
              <div class="sent-message d-none d-block">Pesan anda berhasil dikirim!.</div>
            </div>
            <div class="d-flex justify-content-end my-2">
                <button type="button" class="btn btn-secondary mx-1 cancel-btn">Batal</button>
                <button type="submit" class="btn background-primary mx-1">Kirim</button>
            </div>
          `;
          container.appendChild(form);
  
          // Add event listener to the cancel button
          form.querySelector(".cancel-btn").addEventListener("click", function () {
            container.removeChild(form);
          });
  
          // Add submit event listener to the form
          form.addEventListener("submit", async function (e) {
            e.preventDefault();
            const result = await ajaxSubmitForm(form);
            if (result && result.message) {
              container.querySelector(".sent-message").classList.remove("d-none");
              container.querySelector(".sent-message").classList.add("d-block");
              
            } else {
              container.querySelector(".error-message").textContent = "There was an error submitting your reply.";
            }
          });
  
          // Refresh scripts if needed (e.g., for validation)
        //   refreshScript(validator_path);
        }
      });
    });

    // Add event listeners to all hide message buttons
    document.querySelectorAll(".hide-msg-btn").forEach((button) => {
      button.addEventListener("click", async function () {
        const messageId = this.getAttribute("data-message-id");
        const container = document.getElementById(`msg-container-${messageId}`);
  
        const form = document.createElement("form");
        form.setAttribute("action", `/admin/sembunyikanpesan/${messageId}`);
        form.setAttribute("method", "POST");
        form.innerHTML = `
          ${csrf}
          <input type="hidden" name="_method" value="PATCH">
          <input type="hidden" name="pesan_id" value="${messageId}">
        `;
  
        // Submit the form via AJAX
        const result = await ajaxSubmitForm(form);
        if (result && result.code == 201) {
          container.remove();
        } else {
          console.error("Error hiding the message.");
        }
      });
    });

      
    // Add event listeners to all show message buttons
    document.querySelectorAll(".show-msg-btn").forEach((button) => {
        button.addEventListener("click", async function () {
          const messageId = this.getAttribute("data-message-id");
          const container = document.getElementById(`msg-container-${messageId}`);
    
          const form = document.createElement("form");
          form.setAttribute("action", `/admin/munculkanpesan/${messageId}`);
          form.setAttribute("method", "POST");
          form.innerHTML = `
            ${csrf}
            <input type="hidden" name="_method" value="PATCH">
            <input type="hidden" name="pesan_id" value="${messageId}">
          `;
    
          // Submit the form via AJAX
          const result = await ajaxSubmitForm(form);
          if (result && result.code == 201) {
            container.remove();
          } else {
            console.error("Error hiding the message.");
          }
        });
      });
  
    // AJAX form submission function
    async function ajaxSubmitForm(form) {
      const formData = new FormData(form);
      try {
        const response = await fetch(form.action, {
          method: "POST",
          headers: {
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
          },
          body: formData,
        });
        const data = await response.json();
        return data;
      } catch (error) {
        console.error("Error:", error);
        return false;
      }
    }
  });  