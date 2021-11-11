
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


/*$('.add-another-collection-widget').click(function (e) {
    var list = $($(this).attr('data-list-selector'));
    // Try to find the counter of the list or use the length of the list
    var counter = list.data('widget-counter') || list.children().length;

    // grab the prototype template
    var newWidget = list.attr('data-prototype');
    // replace the "__name__" used in the id and name of the prototype
    // with a number that's unique to your emails
    // end name attribute looks like name="contact[emails][2]"
    newWidget = newWidget.replace(/__name__/g, counter);
    // Increase the counter
    counter++;
    // And store it, the length cannot be used if deleting widgets is allowed
    list.data('widget-counter', counter);

    // create a new list element and add it to the list
    var newElem = $(list.attr('data-widget-tags')).html(newWidget);
    newElem.appendTo(list);
});*/

/*
document.addEventListener("DOMContentLoaded", () => {

    document.querySelectorAll('.add_item_link').forEach(item => {
        // init index
        item.dataset.index = document.querySelectorAll('div.' + item.dataset.collectionType).length;
        item.addEventListener("click", e => {
            let collectionHolder = e.currentTarget;
            // add a new collection form (see next code block)
            addFormToCollection(collectionHolder);
        })
    });

    document.querySelectorAll('.removeItem').forEach(item => {
        item.addEventListener('click', e => {
            let el = document.getElementById(e.target.dataset.removeItem);
            removeElement(el);
        })
    });

});

function addFormToCollection(collectionHolder) {

    // Get the data-prototype explained earlier
    let prototype = collectionHolder.dataset.prototype;
    // Get the new index
    let index = collectionHolder.dataset.index;
    let type = collectionHolder.dataset.collectionType;

    let newForm = prototype;

    // Replace '__name__' in the prototype's HTML to
    // instead be a number based on how many items we have
    newForm = newForm.replace(/__name__/g, index);

    // increase the index with one for the next item
    collectionHolder.dataset.index = Number(index) + 1;

    // Display the form in the page in a new div
    let newFormItem = document.createElement('div');
    newFormItem.setAttribute('class', 'col position-relative ' + type);
    newFormItem.setAttribute('id', type + 'Form-new' + index);
    newFormItem.innerHTML = newForm;

    // Get the last item of the collection type
    let all = document.querySelectorAll('div.' + type);
    let last = all[all.length - 1];
    // Add the new form after this last item
    last.after(newFormItem);
}

function removeElement(el) {
    el.parentNode.removeChild(el);
}*/
