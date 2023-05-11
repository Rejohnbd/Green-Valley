<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    projects: {
        type: Array
    }
})
</script>

<template>
    <Head title="Project List" />

    <AuthenticatedLayout>
        <section class="content-header">
            <h1>
                Project <small> All project</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li class="active">Project List</li>
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
                            <h3 class="box-title">Project List</h3>
                            <div class="box-tools">
                                <Link :href="route('projects.create')" type="button" class="btn btn-primary btn-flat btn-xs pull-right">Add Project</Link>
                            </div>
                        </div>
                        
                        <div class="box-body">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Venture Name</th>
                                        <th>Project Project</th>
                                        <th>Number of Plot</th>
                                        <th>Square Feet Price</th>
                                        <th>Sales Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="project in projects">
                                        <td>{{ project.venture.venture_name }}</td>
                                        <td>{{ project.project_name  }}</td>
                                        <td>{{ project.number_of_plot }}</td>
                                        <td>{{ project.square_feet_price }}</td>
                                        <td v-if="project.sales_status">Sold Out</td>
                                        <td v-else>Not Sale Yet</td>
                                        <td>Edit/Delete</td>
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
