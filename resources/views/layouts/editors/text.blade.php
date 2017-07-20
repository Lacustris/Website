<div class="editor" data-editor="{{ $id }}">
	<div class="editor__controls">
		<div class="editor__control-group">
			<a href="#" class="editor__button" data-command="undo" data-toggle="editor-info" data-info="{{ __('editor.undo') }}"><i class="fa fa-undo"></i></a>
			<a href="#" class="editor__button" data-command="redo" data-toggle="editor-info" data-info="{{ __('editor.redo') }}"><i class="fa fa-repeat"></i></a>
		</div>
		<div class="editor__control-group">
			<a href="#" class="editor__button" data-command="bold" data-toggle="editor-info" data-info="{{ __('editor.bold') }}"><i class="fa fa-bold"></i></a>
			<a href="#" class="editor__button" data-command="italic" data-toggle="editor-info" data-info="{{ __('editor.italic') }}"><i class="fa fa-italic"></i></a>
			<a href="#" class="editor__button" data-command="underline" data-toggle="editor-info" data-info="{{ __('editor.underline') }}"><i class="fa fa-underline"></i></a>
			<a href="#" class="editor__button" data-command="strikeThrough" data-toggle="editor-info" data-info="{{ __('editor.strikethrough') }}"><i class="fa fa-strikethrough"></i></a>
			<a href="#" class="editor__button" data-command="subscript" data-toggle="editor-info" data-info="{{ __('editor.subscript') }}"><i class="fa fa-subscript"></i></a>
			<a href="#" class="editor__button" data-command="superscript" data-toggle="editor-info" data-info="{{ __('editor.superscript') }}"><i class="fa fa-superscript"></i></a>
		</div>
		<div class="editor__control-group">
			<a href="#" class="editor__button" data-command="p" data-toggle="editor-info" data-info="{{ __('editor.paragraph') }}"><i class="fa fa-paragraph"></i></a>
			<a href="#" class="editor__button" data-command="h1" data-toggle="editor-info" data-info="{{ __('editor.h1') }}">H1</a>
			<a href="#" class="editor__button" data-command="h2" data-toggle="editor-info" data-info="{{ __('editor.h2') }}">H2</a>
			<a href="#" class="editor__button" data-command="h3" data-toggle="editor-info" data-info="{{ __('editor.h3') }}">H3</a>
			<a href="#" class="editor__button" data-command="h4" data-toggle="editor-info" data-info="{{ __('editor.h4') }}">H4</a>
			<a href="#" class="editor__button" data-command="h5" data-toggle="editor-info" data-info="{{ __('editor.h5') }}">H5</a>
			<a href="#" class="editor__button" data-command="h6" data-toggle="editor-info" data-info="{{ __('editor.h6') }}">H6</a>
		</div>
		<div class="editor__control-group">
			<a href="#" class="editor__button" data-command="justifyLeft" data-toggle="editor-info" data-info="{{ __('editor.left') }}"><i class="fa fa-align-left"></i></a>
			<a href="#" class="editor__button" data-command="justifyCenter" data-toggle="editor-info" data-info="{{ __('editor.center') }}"><i class="fa fa-align-center"></i></a>
			<a href="#" class="editor__button" data-command="justifyRight" data-toggle="editor-info" data-info="{{ __('editor.right') }}"><i class="fa fa-align-right"></i></a>
			<a href="#" class="editor__button" data-command="justifyFull" data-toggle="editor-info" data-info="{{ __('editor.justify') }}"><i class="fa fa-align-justify"></i></a>
		</div>
		<div class="editor__control-group">
			<a href="#" class="editor__button" data-command="indent" data-toggle="editor-info" data-info="{{ __('editor.indent') }}"><i class="fa fa-indent"></i></a>
			<a href="#" class="editor__button" data-command="outdent" data-toggle="editor-info" data-info="{{ __('editor.outdent') }}"><i class="fa fa-outdent"></i></a>
		</div>
		<div class="editor__control-group">
			<a href="#" class="editor__button" data-command="insertOrderedList" data-toggle="editor-info" data-info="{{ __('editor.orderedList') }}"><i class="fa fa-list-ol"></i></a>
			<a href="#" class="editor__button" data-command="insertUnorderedList" data-toggle="editor-info" data-info="{{ __('editor.unordredList') }}"><i class="fa fa-list-ul"></i></a>
		</div>
		<div class="editor__control-group">
			<a href="#" class="editor__button" data-command="insertimage" data-toggle="editor-info" data-info="{{ __('editor.image') }}"><i class="fa fa-image"></i></a>
			<a href="#" class="editor__button" data-command="createLink" data-toggle="editor-info" data-info="{{ __('editor.link') }}"><i class="fa fa-link"></i></a>
		</div>

		<div class="editor__info">
			<i class="fa fa-info"></i>
			<div class="editor__help"></div>
		</div>
	</div>
	<div id="{{ $id }}" class="editor__textarea" contenteditable>{!! $content !!}</div>
	<textarea name="{{ $id }}" class="editor__target"></textarea>
</div>
