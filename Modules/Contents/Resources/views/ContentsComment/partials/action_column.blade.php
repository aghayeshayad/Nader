@if(!$comment->deleted_at)
    @if($comment->status)
        <button type="button" class="btn btn-warning btn-sm" action-method="POST"
                data-id="{{ $comment -> id }}" button-type="disable"
                data-link="{{ route('admin.contents-comment.ajax.disable') }}">عدم نمایش
        </button>
    @elseif(!$comment->status)
        <button type="button" class="btn btn-success btn-sm" action-method="POST"
                data-id="{{ $comment -> id }}" button-type="enable"
                data-link="{{ route('admin.contents-comment.ajax.enable') }}">نمایش
        </button>
    @endif
    <button type="button" class="btn btn-danger btn-sm" button-type="delete" action-method="POST"
            data-link="{{ route('admin.contents-comment.ajax.destroy', $comment->id) }}">حذف
    </button>
    <button type="button" class="btn btn-primary btn-sm show-message"
            data-toggle="modal" data-target="#kt_modal_{{ $comment->id }}" data-id="{{ $comment->id }}">پیام
    </button>
@elseif($comment->deleted_at)
    <button class="btn btn-primary btn-block btn-sm" button-type="restore" action-method="POST"
            data-link="{{ route('admin.contents-comment.ajax.restore') }}" data-id="{{ $comment -> id }}">بازگردانی
    </button>
@endif

<div class="modal fade" id="kt_modal_{{ $comment->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">پیام کاربر</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-4">
                        <label>نام کاربر:</label>
                        <span>{{ $comment->user_name }}</span>
                    </div>
                    <div class="col-lg-4">
                        <label>نام مقاله:</label>
                        <span>{{ $comment->content_name }}</span>
                    </div>
                    <div class="col-lg-4">
                        <label>تاریخ ثبت نظر:</label>
                        <span>{{ verta($comment->created_at)->format('d %B Y') }}</span>
                    </div>
                </div>
            </div>
            <form class="form-answer" action="{{ route('admin.contents-comment.ajax.show-comment') }}" method="POST"
                  enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                <div class="form-group col-lg-12">
                    <label for="comment-input">دیدگاه کاربر</label>
                    <textarea name="comment" id="comment-input" rows="10" class="form-control"
                              placeholder="لطفا نظر خود را وارد کنید." required>{!! $comment->comment !!}</textarea>
                </div>
                <div class="form-group col-lg-12">
                    <label for="answer-input">پاسخ پیام</label>
                    <textarea name="answer" id="answer-input" rows="10" class="form-control"
                              placeholder="لطفا جواب خود را وارد کنید." required>{!! $comment->answer !!}</textarea>
                </div>
                <div class="form-group col-6 float-left ml-20">
                    <button type="submit" class="btn btn-success btn-sm answer-submit">ارسال</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script type="text/javascript">
    $(document).ready(function () {
        $('.answer-submit').on('click', function (e) {
            e.preventDefault();
            $('.form-answer').submit();
        });
        $('.form-answer').on('submit', function (e) {
            e.preventDefault();
            var $comment_id = $('input[name=comment_id]').val();
            var formData = {
                'comment_id': $comment_id,
                'comment': $('textarea[name=comment]').val(),
                'answer': $('textarea[name=answer]').val()
            };
            $.ajax({
                type: "POST",
                url: "{{ route('admin.contents-comment.ajax.show-comment') }}",
                data: {
                    'formData': formData,
                    '_token': '{{ csrf_token() }}'
                },
                async: true,
                dataType: "text",
                success: function (data) {
                    $('.comment-admin-'+$comment_id).html(JSON.parse(data).comment);
                    $('.answer-admin-'+$comment_id).html(JSON.parse(data).answer);
                    $('#kt_modal_'+$comment_id).modal('hide');
                }
            });
        });
    });
</script>
