<!-- sidebar right  -->
<div class="sidebar sidebar-light sidebar-lg sidebar-end sidebar-overlaid border-start" id="aside">
    <!-- sidebar right header tab & btn-close -->
    <div class="sidebar-header p-0 position-relative">
        <ul class="nav nav-underline-border w-100" role="tablist">
            <li class="nav-item"><a class="nav-link active" data-coreui-toggle="tab" href="#timeline" role="tab">
                    <svg class="icon">
                        <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-list"></use>
                    </svg></a></li>
            <li class="nav-item"><a class="nav-link" data-coreui-toggle="tab" href="#messages" role="tab">
                    <svg class="icon">
                        <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-speech"></use>
                    </svg></a></li>
        </ul>
        <button class="btn-close position-absolute top-50 end-0 translate-middle my-0" type="button" aria-label="Close" onclick="coreui.Sidebar.getInstance(document.querySelector(&quot;#aside&quot;)).toggle()"></button>
    </div>
    <!-- sidebar right Tab content-->
    <div class="tab-content">
        <div class="tab-pane active" id="timeline" role="tabpanel">
            <div class="list-group list-group-flush">
                <div class="list-group-item border-start-4 border-start-secondary bg-body-tertiary text-center fw-bold text-body-secondary text-uppercase small" data-coreui-i18n="today">Today</div>
                <div class="list-group-item border-start-4 border-start-warning list-group-item-divider">
                    <div class="avatar avatar-lg float-end"><img class="avatar-img" src="assets/img/avatars/7.jpg" alt="user@email.com"></div>
                    <div>Meeting with <strong>Lucas</strong></div><small class="text-body-secondary me-3">
                        <svg class="icon">
                            <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-calendar"></use>
                        </svg> 1 - 3pm</small><small class="text-body-secondary">
                        <svg class="icon">
                            <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-location-pin"></use>
                        </svg> Palo Alto, CA</small>
                </div>
                <div class="list-group-item border-start-4 border-start-info">
                    <div class="avatar avatar-lg float-end"><img class="avatar-img" src="assets/img/avatars/4.jpg" alt="user@email.com"></div>
                    <div>Skype with <strong>Megan</strong></div><small class="text-body-secondary me-3">
                        <svg class="icon">
                            <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-calendar"></use>
                        </svg> 4 - 5pm</small><small class="text-body-secondary">
                        <svg class="icon">
                            <use xlink:href="../vendors/@coreui/icons/svg/brand.svg#cib-skype"></use>
                        </svg> On-line</small>
                </div>
                <div class="list-group-item border-start-4 border-start-secondary bg-body-tertiary text-center fw-bold text-body-secondary text-uppercase small" data-coreui-i18n="tomorrow">Tomorrow</div>
                <div class="list-group-item border-start-4 border-start-danger list-group-item-divider">
                    <div>New UI Project - <strong>deadline</strong></div><small class="text-body-secondary me-3">
                        <svg class="icon">
                            <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-calendar"></use>
                        </svg> 10 - 11pm</small><small class="text-body-secondary">
                        <svg class="icon">
                            <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-home"></use>
                        </svg> creativeLabs HQ</small>
                    <div class="avatars-stack mt-2">
                        <div class="avatar avatar-xs"><img class="avatar-img" src="assets/img/avatars/2.jpg" alt="user@email.com"></div>
                        <div class="avatar avatar-xs"><img class="avatar-img" src="assets/img/avatars/3.jpg" alt="user@email.com"></div>
                        <div class="avatar avatar-xs"><img class="avatar-img" src="assets/img/avatars/4.jpg" alt="user@email.com"></div>
                        <div class="avatar avatar-xs"><img class="avatar-img" src="assets/img/avatars/5.jpg" alt="user@email.com"></div>
                        <div class="avatar avatar-xs"><img class="avatar-img" src="assets/img/avatars/6.jpg" alt="user@email.com"></div>
                    </div>
                </div>
                <div class="list-group-item border-start-4 border-start-success list-group-item-divider">
                    <div><strong>#10 Startups.Garden</strong> Meetup</div><small class="text-body-secondary me-3">
                        <svg class="icon">
                            <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-calendar"></use>
                        </svg> 1 - 3pm</small><small class="text-body-secondary">
                        <svg class="icon">
                            <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-location-pin"></use>
                        </svg> Palo Alto, CA</small>
                </div>
                <div class="list-group-item border-start-4 border-start-primary list-group-item-divider">
                    <div><strong>Team meeting</strong></div><small class="text-body-secondary me-3">
                        <svg class="icon">
                            <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-calendar"></use>
                        </svg> 4 - 6pm</small><small class="text-body-secondary">
                        <svg class="icon">
                            <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-home"></use>
                        </svg> creativeLabs HQ</small>
                    <div class="avatars-stack mt-2">
                        <div class="avatar avatar-xs"><img class="avatar-img" src="assets/img/avatars/2.jpg" alt="user@email.com"></div>
                        <div class="avatar avatar-xs"><img class="avatar-img" src="assets/img/avatars/3.jpg" alt="user@email.com"></div>
                        <div class="avatar avatar-xs"><img class="avatar-img" src="assets/img/avatars/4.jpg" alt="user@email.com"></div>
                        <div class="avatar avatar-xs"><img class="avatar-img" src="assets/img/avatars/5.jpg" alt="user@email.com"></div>
                        <div class="avatar avatar-xs"><img class="avatar-img" src="assets/img/avatars/6.jpg" alt="user@email.com"></div>
                        <div class="avatar avatar-xs"><img class="avatar-img" src="assets/img/avatars/7.jpg" alt="user@email.com"></div>
                        <div class="avatar avatar-xs"><img class="avatar-img" src="assets/img/avatars/8.jpg" alt="user@email.com"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane p-3" id="messages" role="tabpanel">
            <div class="message">
                <div class="py-3 pb-5 me-3 float-start">
                    <div class="avatar"><img class="avatar-img" src="assets/img/avatars/7.jpg" alt="user@email.com"><span class="avatar-status bg-success"></span></div>
                </div>
                <div><small class="text-body-secondary">Lukasz Holeczek</small><small class="text-body-secondary float-end mt-1">1:52 PM</small></div>
                <div class="text-truncate fw-bold">Lorem ipsum dolor sit amet</div><small class="text-body-secondary">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt...</small>
            </div>
            <hr>
            <div class="message">
                <div class="py-3 pb-5 me-3 float-start">
                    <div class="avatar"><img class="avatar-img" src="assets/img/avatars/7.jpg" alt="user@email.com"><span class="avatar-status bg-success"></span></div>
                </div>
                <div><small class="text-body-secondary">Lukasz Holeczek</small><small class="text-body-secondary float-end mt-1">1:52 PM</small></div>
                <div class="text-truncate fw-bold">Lorem ipsum dolor sit amet</div><small class="text-body-secondary">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt...</small>
            </div>
            <hr>
            <div class="message">
                <div class="py-3 pb-5 me-3 float-start">
                    <div class="avatar"><img class="avatar-img" src="assets/img/avatars/7.jpg" alt="user@email.com"><span class="avatar-status bg-success"></span></div>
                </div>
                <div><small class="text-body-secondary">Lukasz Holeczek</small><small class="text-body-secondary float-end mt-1">1:52 PM</small></div>
                <div class="text-truncate fw-bold">Lorem ipsum dolor sit amet</div><small class="text-body-secondary">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt...</small>
            </div>
            <hr>
            <div class="message">
                <div class="py-3 pb-5 me-3 float-start">
                    <div class="avatar"><img class="avatar-img" src="assets/img/avatars/7.jpg" alt="user@email.com"><span class="avatar-status bg-success"></span></div>
                </div>
                <div><small class="text-body-secondary">Lukasz Holeczek</small><small class="text-body-secondary float-end mt-1">1:52 PM</small></div>
                <div class="text-truncate fw-bold">Lorem ipsum dolor sit amet</div><small class="text-body-secondary">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt...</small>
            </div>
            <hr>
            <div class="message">
                <div class="py-3 pb-5 me-3 float-start">
                    <div class="avatar"><img class="avatar-img" src="assets/img/avatars/7.jpg" alt="user@email.com"><span class="avatar-status bg-success"></span></div>
                </div>
                <div><small class="text-body-secondary">Lukasz Holeczek</small><small class="text-body-secondary float-end mt-1">1:52 PM</small></div>
                <div class="text-truncate fw-bold">Lorem ipsum dolor sit amet</div><small class="text-body-secondary">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt...</small>
            </div>
        </div>
    </div>
</div>