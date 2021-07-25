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
        <form action="{{ route('admin.categories.store') }}" method="POST"  enctype="multipart/form-data">
            @csrf
            <div class="card card-info col-md-8" style="display:inline-flex">
                <div class="card-header">
                    <h3 class="card-title">Horizontal Form</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Category</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" class="form-control" id="inputEmail3"  placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">description</label>
                            <div class="col-sm-10">
                                <input type="text" name="description" class="form-control" id="inputPassword3"  placeholder="Password">
                            </div>
                        </div>

                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">Create Category</button>
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
