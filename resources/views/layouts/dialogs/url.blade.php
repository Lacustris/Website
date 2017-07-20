<div class="dialog dialog--url">

	<div class="dialog__screen">

		<div class="dialog__title">
			{{ __('general.urlTitle') }}
		</div>
		<div class="dialog__body">
			<div class="row dialog__row">
				<div class="form-group">
					<div class="col-xs-4">
						<label for="dialog-url-link">{{ __( 'general.link' ) }}</label>
					</div>
					<div class="col-xs-8">
						<input id="dialog-url-link" class="dialog__link dialog__link--link form-control">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="form-group">
					<div class="col-xs-4">
						<label for="dialog-url-text">{{ __( 'general.text' ) }}</label>
					</div>
					<div class="col-xs-8">
						<input id="dialog-url-text" class="dialog__link dialog__link--text form-control">
					</div>
				</div>
			</div>
		</div>
		<div class="dialog__actions">
			<button class="btn btn-success dialog__button" data-confirm="true">{{ __( 'general.insert' ) }}</button>
			<button class="btn btn-danger dialog__button" data-confirm="false">{{ __( 'general.cancel' ) }}</button>
		</div>

	</div>

</div>
