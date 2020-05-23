@include('includes.header')
<style>
    h5 {
        display: contents;
    }

    span {
        color: #053269;
        display: contents;
    }
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Starter Page</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Starter Page</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Video Information</h5>

                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">name</th>
                                    <th scope="col">email</th>
                                    <th scope="col">subject</th>
                                    <th scope="col">sent at</th>
                                    <th scope="col">view</th>
                                    <th scope="col">Delete</th>

                                </tr>
                                </thead>

                                <tbody>   <?php $i = 1; ?>
                                @foreach($messages as $msg)

                                    <tr>
                                        <th scope="row"><?php echo $i++;?></th>
                                        <td>{{$msg->name}}</td>
                                        <td>{{$msg->email}}</td>
                                        <td>{{$msg->subject}}</td>
                                        <td>{{$msg->created_at}}</td>
                                        <td>
                                            <button type="button" name="view" class="btn btn-info btn-lg giveFeedback"
                                                    id="giveFeedback"
                                                    data-toggle="modal"
                                                    data-target="#exampleModalCenter{{$msg->id}}">view
                                            </button>
                                        </td>
                                        <td><a href="{{route('delete.msg',$msg->id)}}">
                                                <button type="button" class="btn btn-danger">Delete</button>
                                            </a></td>
                                    </tr>

                                    {{--modal--}}
                                    <div class="modal fade" id="exampleModalCenter{{$msg->id}}" tabindex="-1"
                                         role="dialog"
                                         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h3 class="modal-title" id="exampleModalLongTitle">Message
                                                        Details</h3>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                    </button>
                                                </div>
                                                <h5>Name : </h5> <span>{{$msg->name}}</span><br>
                                                <h5>email : </h5> <span>{{$msg->email}}</span><br>
                                                <h5>subject : </h5> <span>{{$msg->subject}}</span>
                                                <br>
                                                <br>
                                                <h5>Message : </h5> <br><span>{{$msg->message}}</span><br>
                                            </div>
                                        </div>
                                        {{--end modal--}}
                                    </div>

                                @endforeach
                                </tbody>

                            </table>

                        </div>
                    </div>
                </div>
                <!-- /.col-md-6 -->

                <!-- /.col-md-6 -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
        @if(auth()->check())
            <a class="nav-link dropdown-toggle" href="#" id="dropdown04"
               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{auth()->user()->name}}</a>
            <div class="dropdown-menu" aria-labelledby="dropdown04">
                <a class="dropdown-item" style="color : #1b1919; direction: unset" href="{{route('logout')}}">Logout</a>
            </div>

        @endif
    </div>
</aside>
<!-- /.control-sidebar -->
<script>
    $(document).ready(function () {
        $('.view').on("click", function (e) {
            e.preventDefault();
            //perform the url load  then
            $(this).closest('td').find('#myModal').modal({
                keyboard: true
            }, 'show');
            return false;
        });
    });
</script>
@include('includes.footer')
