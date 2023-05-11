<script setup>
import { reactive } from 'vue'
import { Head, Link, router  } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

const form = reactive({
    venture_name: ''
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
                                            <label for="ventureName" class="control-label">Venture Name <span class="text-danger">*</span></label>
                                            <input type="text" v-model="form.venture_name" class="form-control" id="ventureName" placeholder="Enter Venture Name" required>
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
