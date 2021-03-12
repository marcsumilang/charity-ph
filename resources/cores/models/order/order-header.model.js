import ResourceService from "../../services/resource/resource.service";


const resourceService = new ResourceService();

export default class OrderHeaderModel {




    clientBranch (){

        var obj = {
            total: 0,
            grand_total: 0,
            branch_id: resourceService.getAuth().branch_id,
            has_many_order_reference: [],
            has_many_order_detail: [],
            customer_type: 'users',
            order_type_id: 3,
            status_option_id: 10,
            payment_status_option_id: 2,
            order_payment_type_id: 2,
            vat: 0,
            prefix: 'OR'
        }

        return obj;
    }

    clientFranchise (){
        var obj = {
            total: 0,
            grand_total: 0,
            branch_id: auth.branch_id,
            has_many_order_reference: [],
            has_many_order_detail: [],
            customer_type: 'users',
            order_type_id: 3,
            status_option_id: 10,
            payment_status_option_id: 4,
            order_payment_type_id: 2,
            vat: 0,
            prefix: 'OR'
        }

        return obj;
    }

    franchise (){

        var obj = {
            grand_total: 0,
            has_many_order_reference: [],
            has_many_order_detail: [],
            customer_type: 'admins',
            customer: {},
            customer_id:  resourceService.getAuth().id,
            order_type_id: 1,
            prefix: 'OR'
        };

        return obj;
    }
};
