@extends('frontlayout')
@section('title','Manage Posts')
@section('content')
		<div class="row">
			<div class="col-md-8 mb-5">
				<h3 class="mb-4">Quản lý bài viết</h3>
				<div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>#</th>
              <th>Thể loại</th>
              <th>Tiêu đề</th>
              <th>Ảnh đại diện</th>
              <th>Ảnh đầy đủ</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>#</th>
              <th>Thể loại</th>
              <th>Tiêu đề</th>
              <th>Ảnh đại diện</th>
              <th>Ảnh đầy đủ</th>
            </tr>
          </tfoot>
          <tbody>
              @foreach($data as $post)
              <tr>
                <td>{{$post->id}}</td>
                <td>                @php
					if(isset($post->category->title)): 

echo  $post->category->title;
else:

echo 'empty';
endif;
			  @endphp</td>
                <td>{{$post->title}}</td>
                <td><img src="{{ asset('imgs/thumb').'/'.$post->thumb }}" width="100" height="100"/></td>
                <td><img src="{{ asset('imgs/full').'/'.$post->full_img }}" width="100" height="100" /></td>
              </tr>
              @endforeach
          </tbody>
        </table>
        </div>
			</div>
			<!-- Right SIdebar -->
			<div class="col-md-4">
				<!-- Search -->
				<div class="card mb-4">
					<h5 class="card-header">Tìm kiếm</h5>
					<div class="card-body">
						<form action="{{url('/')}}">
							<div class="input-group">
							  <input type="text" name="q" class="form-control" />
							  <div class="input-group-append">
							    <button class="btn btn-dark" type="button" id="button-addon2">Tìm kiếm</button>
							  </div>
							</div>
						</form>
					</div>
				</div>
				<!-- Recent Posts -->
				<div class="card mb-4">
					<h5 class="card-header">Bài viết gần đây</h5>
					<div class="list-group list-group-flush">
						@if($recent_posts)
							@foreach($recent_posts as $post)
								<a href="#" class="list-group-item">{{$post->title}}</a>
							@endforeach
						@endif
					</div>
				</div>
				<!-- Popular Posts -->
				<div class="card mb-4">
					<h5 class="card-header">Bài viết phổ biến</h5>
					<div class="list-group list-group-flush">
						<a href="#" class="list-group-item">Post 1</a>
						<a href="#" class="list-group-item">Post 2</a>
					</div>
				</div>
			</div>
		</div>
<!-- Page level plugin CSS-->
<link href="{{asset('backend')}}/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
<script src="{{asset('backend')}}/vendor/datatables/jquery.dataTables.js"></script>
<script src="{{asset('backend')}}/vendor/datatables/dataTables.bootstrap4.js"></script>
<script src="{{asset('backend')}}/js/demo/datatables-demo.js"></script>
@endsection('content')