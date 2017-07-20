<div class="dialog dialog--images">

	<div class="dialog__screen">

		<div class="dialog__title">
			{{ __('general.imagePickerTitle') }}
		</div>
		<div class="dialog__body">
			<form class="dialog__upload-form" action="/media/upload" method="post">
				{{ csrf_field() }}
				<div class="row">
					<div class="col-md-4">
						{{ __( 'general.uploadImage' ) }}
					</div>
					<div class="col-md-5">
						<input name="image" type="file" class="form-control dialog__upload-field" accept="image/*">
					</div>
					<div class="col-md-3">
						<button class="btn btn-default dialog__image-upload">Upload</button>
					</div> 
				</div>
			</form>
		</div>
		<div class="dialog__body">
			<div class="dialog__image-previews"></div>
			<div class="dialog__image-previews-pages"></div>
		</div>
		<div class="dialog__body">
			<div class="dialog__image-settings">
				<div class="row dialog__row">
					<div class="col-xs-4">
						{{ __( 'general.width' ) }}
					</div>
					<div class="col-xs-5">
						<input class="dialog__image-size dialog__image-size--width form-control" value="">
					</div>
				</div>
				<div class="row dialog__row">
					<div class="col-xs-4">
						{{ __( 'general.height' ) }}
					</div>
					<div class="col-xs-5">
						<input class="dialog__image-size dialog__image-size--height form-control" value="">
					</div>
				</div>
				<div class="row dialog__row">
					<div class="col-xs-4">
						{{ __( 'general.altText' ) }}
					</div>
					<div class="col-xs-5">
						<input class="dialog__alt-text form-control" value="">
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
