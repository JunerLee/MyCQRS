<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <title>Hello, CQRS!</title>
    </head>
    <body>
        <div class="container">
            <div class="col">
                <div class="page-header">
                    <h1>A CQRS DEMO<small>simple and fast</small><span class="label label-default">CQRS</span></h1>
                </div>
                <a class="btn btn-success pull-right" data-toggle="modal" data-target="#addArticleModal">添加</a>
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>author</th>
                        <th>content</th>
                    </tr>
                    </thead>
                </table>

                <div class="modal fade" id="addArticleModal" tabindex="-1" role="dialog" aria-labelledby="Add a article" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">发表文章</h4>
                            </div>
                            <div class="modal-body">
                                <form id="addArticle">
                                    <div class="form-group">
                                        <label for="title">标题</label>
                                        <input class="form-control" name="title" placeholder="title">
                                    </div>
                                    <div class="form-group">
                                        <label for="author">作者</label>
                                        <input class="form-control" name="author" placeholder="author">
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button id="closeModal" type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                                <button type="button" class="btn btn-primary" onclick="add()">发表</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://cdn.bootcss.com/jquery/3.4.0/jquery.min.js"></script>
        <script src="https://cdn.bootcss.com/jquery.form/4.2.2/jquery.form.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </body>
    <script>
        function add(){
            var options = {
                url:"{{ url('/article/add') }}",
                type:"POST",
                dataType:"json",
                data:{
                    _token:"{{ csrf_token() }}",
                   // data: $('#addArticle').serialize(),
                },
                success:function (data) {
                    var html = '<div class="alert alert-success alert-dismissible" role="alert">' +
                        '  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                        '  <strong>发表成功!</strong>' +
                        '</div>';
                    $('#closeModal').click();
                    $('.page-header').append(html);
                }
            };
            $("#addArticle").ajaxSubmit(options);
        }


    </script>

</html>
