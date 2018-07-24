<div class="panel-heading modal-effect mt-3 mb-3">
    <!-- Trigger/Open The Modal -->
    <div class="d-flex justify-content-between">
        <h3>{{ $title }}</h3>
        <button id="myBtn" class="accordion"><i class="fas fa-shopping-cart pr-2"></i>{{ $button }}</button>
    </div>
    <!-- The Modal -->
    <div id="myModal" class="modal">
        <!-- Modal content -->
        <div class="modal-content">
            <div class="modal-header">
                <h3>{{ $header }}</h3>
                <span class="close">&times;</span>
            </div>
            <div class="modal-body">
                @include($view)
            </div>
            <div class="modal-footer">
                <h3></h3>
            </div>
        </div>
    </div>
</div>