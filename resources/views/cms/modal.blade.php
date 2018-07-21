<div class="panel-heading modal-effect mb-3">
    <!-- Trigger/Open The Modal -->
    <button id="myBtn" class="accordion">{{ $button }}</button>
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