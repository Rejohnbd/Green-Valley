<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    ventures: {
        type: Array
    }
})
</script>

<template>
    <Head title="Venture List" />

    <AuthenticatedLayout>
        <section class="content-header">
            <h1>
                Venture <small> All Ventures</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li class="active">Venture List</li>
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
                            <h3 class="box-title">Venture List</h3>
                            <div class="box-tools">
                                <Link :href="route('ventures.create')" type="button" class="btn btn-primary btn-flat btn-xs pull-right">Add Venture</Link>
                            </div>
                        </div>
                        
                        <div class="box-body">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Project Name</th>
                                        <th>Number of Plot</th>
                                        <th>Square Feet Price</th>
                                        <th>Sales Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="venture in ventures">
                                        <td>{{ venture.project_name  }}</td>
                                        <td>{{ venture.number_of_plot }}</td>
                                        <td>{{ venture.square_feet_price }}</td>
                                        <td v-if="venture.sales_status">Sold Out</td>
                                        <td v-else>Not Sale Yet</td>
                                        <td>X</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </AuthenticatedLayout>
</template>
