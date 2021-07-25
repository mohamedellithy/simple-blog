@extends('admin.master')

@section('content')
 <div class="col-xs-12 col-sm-12">
        <!-- Horizontal Form -->
        @if($errors->any())
            @foreach($errors->all() as $error)
                <div class="">
                   {{ $error }}
                </div>
            @endforeach
        @endif
        <form action="{{ route('admin.posts.store') }}" method="POST"  enctype="multipart/form-data">
            @csrf
            <div class="card card-info col-md-8" style="display:inline-flex">
                <div class="card-header">
                    <h3 class="card-title">Horizontal Form</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Title</label>
                            <div class="col-sm-10">
                                <input type="text" name="title" class="form-control" id="inputEmail3"  placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">Excerpt</label>
                            <div class="col-sm-10">
                                <input type="text" name="excerpt" class="form-control" id="inputPassword3"  placeholder="Password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">Content</label>
                            <div class="col-sm-10">
                                 <textarea name="content" id="summernote" >
                                    Place <em>some</em> <u>text</u> <strong>here</strong>
                                 </textarea>
                            </div>
                        </div>

                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">Create Post</button>
                    </div>
            </div>
            <!-- /.card-footer -->
            <div class="card card-outline card-info col-md-3" style="display:inline-flex">
                <div class="card-header">
                    <h3 class="card-title">
                        Category
                    </h3>
                </div>
                <!-- /.card-header -->

                <checkbox-categories></checkbox-categories>

                <div class="card-header">
                    <h3 class="card-title">
                        Image
                    </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <div class="form-group" style="padding: 14px;">
                        <div class="form-check">
                          <input type="file" name="img"  class="form-check-input" >
                          <label class="form-check-label">Checkbox</label>
                        </div>
                    </div>
                </div>
            </div>

        </form>
    </div>
@endsection
@section('script')
<script type="text/javascript">
    jQuery(function () {
        // Summernote
        jQuery('#summernote').summernote()
    })
</script>
@endsection
