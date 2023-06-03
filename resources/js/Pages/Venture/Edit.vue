<script setup>
import { reactive } from 'vue'
import { Head, Link, router, useForm  } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

const props = defineProps({ 
    errors: Object,
    venture: {
        type: Object
    },
});

const form = useForm({
    id: props.venture.id,
    venture_name: props.venture.venture_name,
    number_of_plot: props.venture.number_of_plot,
    venture_description: props.venture.venture_description,
    venture_description: props.venture.venture_description,
    per_square_feet_price: props.venture.per_square_feet_price,
    venture_layout: props.venture.venture_layout,
    active_status: props.venture.active_status,


    // staff_phone: props.staff.staff_phone,
    // staff_address: props.staff.staff_address,
    // staff_start_date: props.staff.staff_start_date,
    // staff_end_date: props.staff.staff_end_date,
    // staff_active_status: props.staff.staff_active_status
});

function submit() {
    // router.post('/ventures', form)
    form.post(route('ventures-update', form));
}
</script>

<template>
    <Head title="Venture Add" />

    <AuthenticatedLayout>
        <section class="content-header">
            <h1>
                Venture <small> Edit Venture</small>
            </h1>
            <ol class="breadcrumb">
                <li><Link :href="route('dashboard')"><i class="fa fa-dashboard"></i> Dashboard</Link></li>
                <li><Link :href="route('ventures.index')">Venture List</Link></li>
                <li class="active">Venture Edit</li>
            </ol>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="alert alert-danger alert-dismissible" v-if="$page.props.flash.status == 'error'">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                        {{ $page.props.flash.message }}
                    </div>
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title">Venture Edit Form</h3>
                        </div>
                        <form @submit.prevent="submit">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="ventureName" class="control-label">Venture Name <span class="text-danger">*</span></label>
                                            <input type="text" v-model="form.venture_name" class="form-control" id="ventureName" placeholder="Enter Venture Name" required>
                                        </div>
                                        <span class="help-block" style="color: red;">{{ errors.venture_name }}</span>
                                        <span class="help-block" style="color: red;">{{ errors.venture_name_slug }}</span>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group" for="ventureDescription">
                                            <label>Venture Description</label>
                                            <textarea class="form-control" id="ventureDescription" v-model="form.venture_description" rows="3" placeholder="Enter Venture Description"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="squareFeetPrice" class="control-label">Square Feet Price <span class="text-danger">*</span></label>
                                            <input type="number" v-model="form.per_square_feet_price" step="any" class="form-control" id="squareFeetPrice" placeholder="Enter Square Feet Price" required>
                                        </div>
                                        <span class="help-block" style="color: red;">{{ errors.per_square_feet_price }}</span>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="venturBrosure">Upload Venture Brochure</label>
                                            <input id="venturBrosure" type="file" @input="form.venture_brochure = $event.target.files[0]"  accept=".pdf">
                                        </div>
                                        <span class="help-block" style="color: red;">{{ errors.venture_brochure }}</span>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="ventureLayout">Upload Venture Layout</label>
                                            <input id="ventureLayout" type="file" @input="form.venture_layout = $event.target.files[0]"  accept=".png, .jpg, .jpeg">
                                        </div>
                                        <span class="help-block" style="color: red;">{{ errors.venture_layout }}</span>
                                        <img v-if="form.venture_layout" class="img-responsive" style="width: 80px" :src="form.venture_layout" alt="Photo" />
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="ventureStatus" class="control-label">Select Venture Active Status <span class="text-danger">*</span></label>
                                            <select class="form-control" v-model="form.active_status" id="ventureStatus" required>
                                                <option value="1">Active</option>
                                                <option value="0">Inactive</option>
                                            </select>
                                            <span class="help-block" style="color: red;">{{ errors.active_status }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-footer">
                                <Link :href="route('ventures.index')" class="btn btn-default">Cancel</Link>
                                <button type="submit" class="btn btn-info pull-right">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </AuthenticatedLayout>
</template>
