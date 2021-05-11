<div class="container-fluid">
                <div class="game-content" style="padding: 2px; width: auto;height: 85vh;margin-left: auto;margin-right: auto;">
				<style>
				.modal__iframe {
					border-radius: 5px;
					overflow: hidden;
					height: 100%;
				}
				.modal-iframe {
					width: 100%;
					height: 100%;
					border: 0;
				}
				 
                .pageContent {
                    opacity: 100;
                }
				</style>
				<div class="modal__iframe">
				<iframe class="modal-iframe" id="gameFrame" src="{{ isset($url) ? $url : ''  }}" frameborder="0"></iframe>
				</div>
				</div>
</div>

<style>
.pageContent {
    opacity: 100%!important;
}
</style>
