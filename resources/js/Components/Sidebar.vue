<script setup>
    import { Link } from '@inertiajs/vue3';
</script>

<template>
    <aside class="main-sidebar">
        <section class="sidebar">
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="/admin/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p>{{ $page.props.auth.user.name }}</p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>

            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">MAIN NAVIGATION</li>
                <!-- <li class="treeview">
                    <a href="javascript:void(0);">
                        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="../../index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
                        <li><a href="../../index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
                    </ul>
                </li> -->
                <li><Link :href="route('dashboard')"><i class="fa fa-dashboard"></i> <span>Dashboard</span></Link></li>
                <li><Link :href="route('ventures.index')"><i class="fa fa-book"></i> <span>Venture</span></Link></li>
                <li><Link :href="route('venture-plots.index')"><i class="fa fa-book"></i> <span>Venture Plots</span></Link></li>
                <li><Link :href="route('customers.index')"><i class="fa fa-book"></i> <span>Customers</span></Link></li>
            </ul>
        </section>
    </aside>
</template>