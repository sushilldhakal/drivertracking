<input type="file" id="file-input" class="form-control">
<div id="img_contain">
    <img id="image-preview" src="http://www.clker.com/cliparts/c/W/h/n/P/W/generic-image-file-icon-hi.png" alt="your image" title='' />
</div>
@section('scripts')
  <script defer>
    var drop = new Dropzone('#file-input', {
      url: "{{ route('upload', [$resource->resourceType, $resource->id]) }}"
    });
  </script>
@endsection
