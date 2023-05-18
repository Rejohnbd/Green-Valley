<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import Pagination from '@/Components/Pagination.vue'

defineProps({
    venture_plots: {
        type: Object
    }
})
</script>

<template>
    <Head title="Venture Plots" />

    <AuthenticatedLayout>
        <section class="content-header">
            <h1>
                Venture Plot<small> All Venture Plot</small>
            </h1>
            <ol class="breadcrumb">
                <li><Link :href="route('dashboard')"><i class="fa fa-dashboard"></i> Dashboard</Link></li>
                <li class="active">Venture Plot List</li>
            </ol>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="alert alert-success alert-dismissible" v-if="$page.props.flash.status == 'success'">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-check"></i> Success</h4>
                        {{ $page.props.flash.message }}
                    </div>

                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title">Venture Plot List</h3>
                        </div>
                        
                        <div class="box-body">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Venture Name</th>
                                        <th>Plot Id</th>
                                        <th>Plot Name</th>
                                        <th>Plot Square Feet</th>
                                        <th>Total Price</th>
                                        <th>Customer</th>
                                        <th>Saleman</th>
                                        <th>Sale Date</th>
                                        <th>Handover Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="vplot in venture_plots.data">
                                        <td>{{ vplot.venture_info.venture_name }}</td>
                                        <td>{{ vplot.plot_id }}</td>
                                        <td>{{ vplot.plot_name }}</td>
                                        <td>{{ vplot.number_of_square_feet }}</td>
                                        <td>{{ vplot.total_price }}</td>
                                        <td>{{ vplot.customer_id }}</td>
                                        <td>{{ vplot.staff_id }}</td>
                                        <td>{{ vplot.sale_date }}</td>
                                        <td>{{ vplot.handover_date }}</td>
                                        <td>
                                            <Link :href="route('venture-plots.edit', vplot)" class="btn btn-social-icon btn-dropbox"><i class="fa fa-edit"></i></Link>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="box-footer clearfix">
                            <Pagination class="mt-6" :links="venture_plots.links" />
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </AuthenticatedLayout>
</template>
