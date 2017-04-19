<div class="col-md-3">
    <div class="list-group">
        <a href="{{ url('/') }}"
        class="list-group-item {{ Request::path() != 'student/create' ? 'active' : '' }}">学生列表</a>
        <a href="{{ url('student/create') }}"
        class="list-group-item {{ Request::path() == 'student/create' ? 'active' : '' }}">新增学生</a>
    </div>
</div>
