<div class="modal modal-blur fade" id="modal-small" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
       <div class="modal-content">
          <div class="modal-body">
             <div class="modal-title">Tem certeza?</div>
             <div>Se continuar, não poderá reverter.</div>
          </div>
          <div class="modal-footer">
             <button type="button" class="btn btn-link link-secondary me-auto" data-bs-dismiss="modal">Cancelar</button>
             <form method="POST" id="delete" action="">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">
                Sim, desejo excluir
                </button>
             </form>
          </div>
       </div>
    </div>
 </div>