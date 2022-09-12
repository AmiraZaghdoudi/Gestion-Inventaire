var Select2 = {
    init: function () {
        $('#m_select2_1, #m_select2_1_validate').select2(
            {
                placeholder: 'Select a FO'
            }
        );
    }
};
jQuery(document).ready(
    function () {
        Select2.init();
    }
);
