@extends('layouts.main')

@section('content')
<main id="main">
  <!-- ======= Team Section ======= -->
    <div class="container-fluid section-bg">
      <div class="row">
        @include('partials.sidemenu')
        <div class="col team overflow-hidden">
          <div class="container">
            <div class="row">
              <div class="col">
                <div class="section-title">
                  <h3>Tambahkan Struktur Organisasi Koharmat<span>AU</span></h3>
                  {{-- <p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.</p> --}}
                </div>
      
                <div class="tree overflow-scroll">
                  <ul>
                      <li data-node-predecessor='-1' id="add-node--1">
                          <button class="btn btn-primary add-node-btn">Tambah</button>
                      </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>

    </div>
</main>
<script>
    document.addEventListener('DOMContentLoaded', (event) => {
      const navbar = document.querySelector('.navbar'); // Adjust the selector to match your navbar
        const sideMenuContainer = document.querySelector('.side-menu-container');
        const toggleButton = document.getElementById('toggle-button');
        const menuContent = document.getElementById('menu-content');
        const messageContainer = document.getElementById('message-container');

        // Toggle side menu visibility
        toggleButton.addEventListener('click', function() {
            if (menuContent.style.display === 'none') {
                menuContent.style.display = 'block';
                toggleButton.innerHTML = '<i class="bx bx-chevron-left"></i>';
                sideMenuContainer.style.marginLeft = '0';
            } else {
                menuContent.style.display = 'none';
                toggleButton.innerHTML = '<i class="bx bx-chevron-right"></i>';
                sideMenuContainer.style.marginLeft = (sideMenuContainer.offsetWidth*-1 + 15) + "px"; // Adjust based on the width of your side menu
            }
        });

        document.querySelectorAll('.reply-btn').forEach(button => {
            button.addEventListener('click', function() {
                const messageId = this.getAttribute('data-message-id');
                const container = document.getElementById(`reply-form-container-${messageId}`);

                if (!container.querySelector('form')) { // Check if form already exists
                    const form = document.createElement('form');
                    form.innerHTML = `
                        <div class="form-group">
                            <textarea id="reply-${messageId}" class="form-control" rows="3" placeholder="Masukkan balasan"></textarea>
                        </div>
                        <div class="d-flex justify-content-end my-2">
                            <button type="button" class="btn btn-secondary mx-1 cancel-btn">Batal</button>
                            <button type="submit" class="btn background-primary mx-1">Kirim</button>
                        </div>
                    `;
                    container.appendChild(form);

                    // Add event listener to the cancel button
                    form.querySelector('.cancel-btn').addEventListener('click', function() {
                        container.removeChild(form);
                    });
                }
            });
        });  
      
      var id = 1;

        // Function to add a new node
        function addNode(event) {
            const currentButton = this;
            const nodePredecessor = this.parentNode.getAttribute('data-node-predecessor');
            const nodeContainer = document.getElementById(`add-node-${nodePredecessor}`);
            let itemParentNode = nodeContainer.parentNode;

            let childNodeForm = document.createElement('li');
            childNodeForm.setAttribute('data-predecessor', nodePredecessor);
            childNodeForm.setAttribute('data-node-id', id);
            childNodeForm.setAttribute('id', `node-item-${id}`);
            childNodeForm.innerHTML = `
                <div class="tree-node">
                    <img src="{{ asset('assets/img/strukturorganisasi/1.png') }}" class="tree-image">
                    <span class="tree-text"><input type="text" class="form-control w-50 d-inline" placeholder="Masukkan nama"></input></span>
                    <button type="button" class="btn btn-success save-btn">Simpan</button>
                </div>
                <ul>
                    <li data-node-predecessor='${id}' id="add-node-${id}">
                        <button class="btn btn-primary add-node-btn">Tambah</button>
                    </li>
                </ul>
            `;
            itemParentNode.appendChild(childNodeForm);

            // Add event listener to the new button
            childNodeForm.querySelector('.add-node-btn').addEventListener('click', addNode);
            childNodeForm.querySelector('.save-btn').addEventListener('click', () => {
                    document.querySelectorAll('.add-node-btn').forEach(button => {
                    button.disabled = false;
                });
            });
            itemParentNode.appendChild(nodeContainer);

            id += 1;

            document.querySelectorAll('.add-node-btn').forEach(button => {
                button.disabled = true;
            });
        }

        // Attach the event listener to the existing button(s)
        document.querySelectorAll('.add-node-btn').forEach(button => {
            button.addEventListener('click', addNode);
        });

        document.querySelectorAll('.save-btn').forEach(button => {
            button.addEventListener('click', () => {
                document.querySelectorAll('.add-node-btn').forEach(button => {
                button.disabled = false;
            });
            });
        });
    });
</script>

@endsection
