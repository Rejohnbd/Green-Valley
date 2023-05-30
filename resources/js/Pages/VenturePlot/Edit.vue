<template>
    <Head title="Venture Plot Edit" />

    <AuthenticatedLayout>
        <section class="content-header">
            <h1>
                Venture Plot <small> Edit Venture</small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <Link :href="route('dashboard')"><i class="fa fa-dashboard"></i> Dashboard</Link>
                </li>
                <li>
                    <Link :href="route('venture-plots.index')">Venture Plots</Link>
                </li>
                <li class="active">Venture Plot Edit</li>
            </ol>
        </section>

        <section class="content">
            <button id="rejohn" v-if="isLoading">Abc</button>
            <div class="row" v-else>
                <div class="col-xs-12">
                    <div class="alert alert-danger alert-dismissible" v-if="$page.props.flash.status == 'error'">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                        {{ $page.props.flash.message }}
                    </div>
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title">Venture Plot Edit Form</h3>
                        </div>
                        <form @submit.prevent="submit">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="plotName" class="control-label">Plot Name </label>
                                            <input 
                                                type="text" 
                                                v-model="form.plot_name" 
                                                class="form-control" 
                                                id="plotName"
                                                placeholder="Enter Plot Name"
                                            >
                                        </div>
                                        <span class="help-block" style="color: red;">{{ errors.plot_name }}</span>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="numberOfSquareFeet" class="control-label">Number of Square Feet</label>
                                            <input 
                                                type="number" 
                                                v-model="form.number_of_square_feet" 
                                                class="form-control"
                                                id="numberOfSquareFeet" 
                                                placeholder="Enter Number of Square Feet"
                                            >
                                        </div>
                                        <span class="help-block" style="color: red;">{{ errors.number_of_square_feet }}</span>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="totalPrice" class="control-label">Total Price </label>
                                            <input 
                                                type="number" 
                                                v-model="form.total_price" 
                                                class="form-control"
                                                id="totalPrice" 
                                                placeholder="Enter Total Price"
                                            >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="selectCustomer" class="control-label">Select Customer <span class="text-danger">*</span></label>
                                            <VueNextSelect 
                                                id="selectCustomer" 
                                                v-model="form.customer_id" 
                                                searchable
                                                :options="this.$props.all_customers" 
                                                label-by="customer_name"
                                                class="vue-next-select" 
                                            />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="selectStaff" class="control-label">Select Staff <span
                                                    class="text-danger">*</span></label>
                                            <select class="form-control" v-model="form.staff_id" id="selectStaff" required>
                                                <option value="">Select Staff</option>
                                                <option :value="staff.id" v-for="staff in  this.$props.all_staffs">{{staff.staff_name }} ({{ staff.staff_phone }})</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="saleDate" class="control-label">Sale Date</label>
                                            <!-- <input type="date" class="form-control datepicker" v-model="form.sale_date" id="saleDate" placeholder="Enter Sale Date"> -->
                                            <VueDatePicker 
                                                v-model="form.sale_date"
                                                placeholder="Enter Sale Date"
                                                class="vue-date-picker"
                                            />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="handOverDate" class="control-label">Handover Date </label>
                                            <!-- <input type="date" class="form-control datepicker" v-model="form.handover_date" id="handOverDate" placeholder="Enter Handouver Date"> -->
                                            <VueDatePicker 
                                                v-model="form.handover_date"
                                                placeholder="Enter Handover Date"
                                                class=""
                                            />
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="box-footer">
                                <Link :href="route('venture-plots.index')" class="btn btn-default">Cancel</Link>
                                <button type="submit" class="btn btn-info pull-right">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </AuthenticatedLayout>
</template>

<script>
import { reactive, toRaw, ref  } from 'vue'
import { Head, Link, router, useForm } from '@inertiajs/vue3';
import VueNextSelect from 'vue-next-select'
import 'vue-next-select/dist/index.min.css'
import VueDatePicker from '@vuepic/vue-datepicker';
import '@vuepic/vue-datepicker/dist/main.css'
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

export default {
    name: 'EditPlot',
    components: {
        Head,
        Link,
        AuthenticatedLayout,
        VueDatePicker,    
        VueNextSelect
    },
    props: {
        errors: Object,
        venture_plot: {
            type: Object
        },
        all_customers: {
            type: Array,
            default: () => []
        },
        all_staffs: {
            type: Array
        }
    },
    created(){
        // console.log(this.$props.all_customers)
        console.log(toRaw(this.$props.all_customers))
        // console.log(typeof this.$props.all_staffs)
        // this.allCustomers = toRaw(this.$props.all_customers)
        // console.log(JSON.parse(JSON.stringify(this.tickets)) )
        this.isLoading = false
    },
    setup() {
        const customer_id = ref();
        // const sale_date = ref();
    },
    data(){
        return {
            form: {
                plot_name: '',
                number_of_square_feet: '',
                total_price: '',
                customer_id: '',
                staff_id: '',
                sale_date: '',
                handover_date: '',
            },
            allCustomers: [
                {
                    "id": 1,
                    "customer_name": "Test Customer",
                    "customer_phone": "1745248533"
                }
            ],
            isLoading: true
        }
    }
    
}


// $(".select2").select2({
//     templateSelection: function (data, container) {
//         $(data.element).attr("data-custom-attribute", data.customValue);
//         return data.text;
//     },
// });
// console.log(props)
// const form = useForm({
//     plot_name: props.venture_plot.plot_name,
//     number_of_square_feet: props.venture_plot.number_of_square_feet,
//     total_price: props.venture_plot.total_price,
//     customer_id: '',
//     staff_id: '',
//     sale_date: '',
//     handover_date: '',
//     // all_customers: props.all_customers
// });

function submit() {
    form.put(route('staffs.update', props.staff.id))
}

// function testClick() {
//     const swal = new VueSweetalert2();
//     // swal('Hello Vue world!!!')
//     console.log(swal.fire());
//     console.log('click')
// }
</script>

