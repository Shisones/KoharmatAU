document.addEventListener("DOMContentLoaded", (event) => {
  document.querySelectorAll(".reply-btn").forEach((button) => {
    button.addEventListener("click", function () {
      const messageId = this.getAttribute("data-message-id");
      const container = document.getElementById(
        `reply-form-container-${messageId}`
      );

      if (!container.querySelector("form")) {
        // Check if form already exists
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
        form
          .querySelector(".cancel-btn")
          .addEventListener("click", function () {
            container.removeChild(form);
          });

        refreshScript(
          validator_script
        );
      }
    });
  });

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
    document.head.appendChild(script);
  }
});
