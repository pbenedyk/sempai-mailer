<div id="deleteModal" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <p>Czy napewno chcesz usunąć maila?</p>
            </div>
            <div class="modal-footer text-center">
                <form id="deleteForm" method="POST" action="{{ route('mailerDelete') }}">
                    @csrf
                    <input type="hidden" name="item_id" value="-1">
                    <button type="submit" class="btn btn-danger">Tak, usuń</button>
                </form>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
