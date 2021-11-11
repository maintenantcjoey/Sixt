
$(function () {
    $('.add_item_link').on('click', function (e){
        e.preventDefault();
        let $this = $(this);
        let counter = $this.data('counter');
        let type = $this.data('type');
        let prototype = $(this).data('prototype');
        prototype = prototype.replace(/__name__/g, counter)
        counter++;
        $this.data("counter", Number(counter))
        $('ul.' + type).append(prototype)
    })

    $(document.body).on('click', '.on-remove', function (e) {
        e.preventDefault();
        $(this).parent().remove();
    })
})