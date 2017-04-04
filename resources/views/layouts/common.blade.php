<!-- protavel destory form -->
<form id="protavel-form-destroy" method="POST">
    <input type="hidden" name="_method" value="DELETE">
    {!! csrf_field() !!}

    <script>
        function protavelDestroy(element) {
            var url = $(element).attr('data-href');

            if (window.confirm('你确定要删除？')) {
                var destroyForm = $('#protavel-form-destroy');
                destroyForm.attr('action', url);
                destroyForm.submit();
            }
        }
    </script>
</form>
