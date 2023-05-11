<script setup>
import { reactive } from 'vue'
import { Head, Link, router  } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

const form = reactive({
    project_name: '',
    number_of_plot: '',
    square_feet_price: '',
    sales_status: 0
});

function submit() {
    router.post('/ventures', form)
}
</script>

<template>
    <Head title="Venture Add" />

    <AuthenticatedLayout>
        <section class="content-header">
            <h1>
                Venture <small> Create Venture</small>
            </h1>
            <ol class="breadcrumb">
                <li><Link :href="route('dashboard')"><i class="fa fa-dashboard"></i> Dashboard</Link></li>
                <li><Link :href="route('ventures.index')">Venture List</Link></li>
                <li class="active">Venture Create</li>
            </ol>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title">Venture Create Form</h3>
                        </div>
                        <form @submit.prevent="submit">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="projectName" class="control-label">Project <span class="text-danger">*</span></label>
                                            <input type="text" v-model="form.project_name" class="form-control" id="projectName" placeholder="Enter Project Name" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="plotNumber" class="control-label">Number of Plot <span class="text-danger">*</span></label>
                                            <input type="number" v-model="form.number_of_plot" class="form-control" id="plotNumber" placeholder="Enter Number of Plot" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="squareFeetPrice" class="control-label">Square Feet Price <span class="text-danger">*</span></label>
                                            <input type="text" v-model="form.square_feet_price" class="form-control" id="squareFeetPrice" placeholder="Enter Square Feet Price" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="saleStatus" class="control-label">Select Sale Status <span class="text-danger">*</span></label>
                                            <select class="form-control" v-model="form.sales_status" id="saleStatus" required>
                                                <option value="0">Not Sale Yet</option>
                                                <option value="1">Sold Out</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-footer">
                                <Link :href="route('ventures.index')" class="btn btn-default">Cancel</Link>
                                <button type="submit" class="btn btn-info pull-right">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </AuthenticatedLayout>
</template>
