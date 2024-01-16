define(
    [
        'uiComponent',
        'Magento_Checkout/js/model/payment/renderer-list'
    ],
    function (
        Component,
        rendererList
    ) {
        'use strict';
        rendererList.push(
            {
                type: 'payment_method',
                component: 'BicicletasMilan_PaymentMethod/js/view/payment/method-renderer/payment_method'
            }
        );
        /** Add view logic here if needed */
        return Component.extend({});
    }
);
