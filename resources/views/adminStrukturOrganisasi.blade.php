@extends('layouts.main')

@section('content')
<main id="main">
  <!-- ======= Team Section ======= -->
  <section id="team" class="team section-bg">
    <div class="container" data-aos="fade-up">
      <div class="row">
        <div class="col-lg-12 col-md-6">
          <div class="section-title">
            <h3>Struktur Organisasi <span>KoharmatAU</span></h3>
            <p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.</p>
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
  </section><!-- End Team Section -->
</main>
<script>
    document.addEventListener('DOMContentLoaded', (event) => {
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
                    <img src="assets/img/strukturorganisasi/1.png" class="tree-image">
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
