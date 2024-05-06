<div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
    <!--begin::Menu Container-->
    <div id="kt_aside_menu" class="aside-menu my-4" data-menu-vertical="1" data-menu-scroll="1" data-menu-dropdown-timeout="500">
        <!--begin::Menu Nav-->
        <ul class="menu-nav">

        	@php
            $rolePermissionArr = session('rolePermission');
            @endphp

            <li class="menu-item menu-item-active {{ \Helper::isActivate(['home'])}}" aria-haspopup="true">
                <a href="{{ route('admin.dashboard') }}" class="menu-link">
                    <span class="svg-icon menu-icon">
                        <i class="flaticon-layer"></i>
                    </span>
                    <span class="menu-text">Dashboard</span>
                </a>
            </li>
            
            @if(
            	@$rolePermissionArr['roleCode'] == 'SUPER_ADMIN' ||
            	in_array('ProgramController', @$rolePermissionArr['permissions'])
        	)
            	@include('admin/includes/sidebar/program')
            @endif
                        
            @if(
            	@$rolePermissionArr['roleCode'] == 'SUPER_ADMIN' ||
            	in_array('VenueController', @$rolePermissionArr['permissions'])
        	)
            	@include('admin/includes/sidebar/venue')
            @endif
            
            @if(
            	@$rolePermissionArr['roleCode'] == 'SUPER_ADMIN' ||
            	in_array('VibeController', @$rolePermissionArr['permissions'])
        	)
            	@include('admin/includes/sidebar/vibe')
            @endif
            
            @if(
            	@$rolePermissionArr['roleCode'] == 'SUPER_ADMIN' ||
            	in_array('CuratorController', @$rolePermissionArr['permissions'])
        	)
            	@include('admin/includes/sidebar/curator')
            @endif

            @if(
            	@$rolePermissionArr['roleCode'] == 'SUPER_ADMIN' ||
            	in_array('MediaController', @$rolePermissionArr['permissions'])
        	)
            	@include('admin/includes/sidebar/media')
            @endif

            @if(
            	@$rolePermissionArr['roleCode'] == 'SUPER_ADMIN' ||
            	in_array('ContactusController', @$rolePermissionArr['permissions'])
        	)
            	@include('admin/includes/sidebar/contact_us')
            @endif

            @if(
                @$rolePermissionArr['roleCode'] == 'SUPER_ADMIN' ||
                in_array('SponsorController', @$rolePermissionArr['permissions'])
            )
                @include('admin/includes/sidebar/sponsors')
            @endif

            @if(
                @$rolePermissionArr['roleCode'] == 'SUPER_ADMIN' ||
                in_array('CouponController', @$rolePermissionArr['permissions'])
            )
                @include('admin/includes/sidebar/coupon')
            @endif

            @if(
                @$rolePermissionArr['roleCode'] == 'SUPER_ADMIN' ||
                (in_array('MediaSlotController', @$rolePermissionArr['permissions']) || 
                in_array('MediaBookingController', @$rolePermissionArr['permissions']))
            )
                @include('admin/includes/sidebar/media_booking')
            @endif

            @if(
            	@$rolePermissionArr['roleCode'] == 'SUPER_ADMIN' ||
            	in_array('OrderController', @$rolePermissionArr['permissions'])
        	)
            	@include('admin/includes/sidebar/order')
            @endif

            @if(
                @$rolePermissionArr['roleCode'] == 'SUPER_ADMIN' ||
                in_array('ReportController', @$rolePermissionArr['permissions'])
            )
                @include('admin/includes/sidebar/report')
            @endif

            @if(
                @$rolePermissionArr['roleCode'] == 'SUPER_ADMIN' ||
                in_array('UserReportController', @$rolePermissionArr['permissions'])
            )
                @include('admin/includes/sidebar/user_report')
            @endif

            <li class="menu-section">
                <h4 class="menu-text">Ecommerce</h4>
                <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
            </li>

            @if(
                @$rolePermissionArr['roleCode'] == 'SUPER_ADMIN' ||
                in_array('EccomCategoryController', @$rolePermissionArr['permissions'])
            )
                @include('admin/includes/sidebar/ecomm_category')
            @endif

            @if(
                @$rolePermissionArr['roleCode'] == 'SUPER_ADMIN' ||
                in_array('EccomProductController', @$rolePermissionArr['permissions'])
            )
                @include('admin/includes/sidebar/ecomm_product')
            @endif

            @if(
                @$rolePermissionArr['roleCode'] == 'SUPER_ADMIN' ||
                in_array('EccomOrderController', @$rolePermissionArr['permissions'])
            )
                @include('admin/includes/sidebar/ecomm_order')
            @endif

        	<li class="menu-section">
                <h4 class="menu-text">Accesses</h4>
                <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
            </li>

            @if(@$rolePermissionArr['roleCode'] == 'SUPER_ADMIN')
            	@include('admin/includes/sidebar/admin_user')
            @endif

            @if(
            	@$rolePermissionArr['roleCode'] == 'SUPER_ADMIN' ||
            	in_array('UserController', @$rolePermissionArr['permissions'])
        	)
            	@include('admin/includes/sidebar/user')
            @endif

            @if(
                @$rolePermissionArr['roleCode'] == 'SUPER_ADMIN' ||
                in_array('VolunteerController', @$rolePermissionArr['permissions'])
            )
                @include('admin/includes/sidebar/volunteer')
            @endif

            @if(@$rolePermissionArr['roleCode'] == 'SUPER_ADMIN')
            	@include('admin/includes/sidebar/role')
            @endif

            @if(@$rolePermissionArr['roleCode'] == 'SUPER_ADMIN')
            	@include('admin/includes/sidebar/admin_module')
            @endif

            <li class="menu-section">
                <h4 class="menu-text">Masters</h4>
                <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
            </li>

            @if(
            	@$rolePermissionArr['roleCode'] == 'SUPER_ADMIN' ||
            	in_array('DisciplineController', @$rolePermissionArr['permissions'])
        	)
            	@include('admin/includes/sidebar/discipline')
            @endif

            @if(
            	@$rolePermissionArr['roleCode'] == 'SUPER_ADMIN' ||
            	in_array('AccessibilityController', @$rolePermissionArr['permissions'])
        	)
            	@include('admin/includes/sidebar/accessibility')
            @endif

            @if(
            	@$rolePermissionArr['roleCode'] == 'SUPER_ADMIN' ||
            	in_array('CategoryController', @$rolePermissionArr['permissions'])
        	)
            	@include('admin/includes/sidebar/category')
            @endif

            @if(
            	@$rolePermissionArr['roleCode'] == 'SUPER_ADMIN' ||
            	in_array('ProgramTagController', @$rolePermissionArr['permissions'])
        	)
            	@include('admin/includes/sidebar/program_tag')
            @endif

            @if(
                @$rolePermissionArr['roleCode'] == 'SUPER_ADMIN' ||
                in_array('SponsorTypeController', @$rolePermissionArr['permissions'])
            )
                @include('admin/includes/sidebar/sponsor_type')
            @endif
            
            <!-- New Section Start -->
            <li class="menu-section">
                <h4 class="menu-text">Settings</h4>
                <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
            </li>

            @if(
            	@$rolePermissionArr['roleCode'] == 'SUPER_ADMIN' ||
            	in_array('SmsTemplateController', @$rolePermissionArr['permissions']) ||
            	in_array('EmailTemplateController', @$rolePermissionArr['permissions'])
        	)
            	@include('admin/includes/sidebar/template', $rolePermissionArr)
            @endif

         	@if(@$rolePermissionArr['roleCode'] == 'SUPER_ADMIN')
            	@include('admin/includes/sidebar/system_settings')
            @endif

        </ul>
        <!--end::Menu Nav-->
    </div>
    <!--end::Menu Container-->
</div>