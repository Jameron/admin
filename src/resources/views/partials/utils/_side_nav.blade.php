<div id="sidebar-wrapper">
    <ul class="sidebar-nav" id="sidebar">
        <li>
            <a href="{!! url('dash') !!}" @if(Request::path()=='dash') class="active" @endif><span class="sub_icon glyphicon glyphicon-dashboard"></span> Dashboard</a>
        </li>
        <li>
            <a href="{!! url('/users') !!}" @if(Request::path()=='users') class="active" @endif>Users<span class="sub_icon glyphicon glyphicon-user"></span></a>
        </li>
        <li>
            <a href="{!! url('/invitations') !!}" @if(Request::path()=='invitations') class="active" @endif>Invitations<span class="sub_icon glyphicon glyphicon-envelope"></span></a>
        </li>
        <li>
            <a href="{!! url('/global_messages') !!}" @if(Request::path()=='global_messages') class="active" @endif>Global Messages<span class="sub_icon glyphicon glyphicon-warning-sign"></span></a>
        </li>
        <li>
            <a href="{!! url('/faq_questions') !!}" @if(Request::path()=='faq_questions') class="active" @endif>FAQ<span class="sub_icon glyphicon glyphicon-comment"></span></a>
        </li>
    </ul>
    <div id="admin-stats">
        <div class="row">
            <div class="col-sm-12">
                <div class="text-center">
                    <div class="stat-icon">
                        <i class="glyphicon glyphicon-user"></i>
                    </div>
                    <div class="text">
                        <var>0</var>
                        <label class="text-muted"> 0 online</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
