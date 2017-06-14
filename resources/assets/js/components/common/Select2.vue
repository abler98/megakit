<template>
    <select title="select" class="form-control">
        <slot></slot>
    </select>
</template>

<script>
    export default {
        props: {
            onChange: Function,
            options: Array,
            selected: Number
        },
        watch: {
            selected() {
                $(this.$el).val(this.selected).trigger('change');
            },
            options() {
                $(this.$el).select2({ data: this.options })
                    .val(this.selected).trigger('change');
            }
        },
        methods: {
            change(event) {
                let selected = $(this.$el).val();
                this.onChange(event, selected, this.clear);
            },
            clear() {
                $(this.$el).val(null).trigger('change');
            }
        },
        mounted() {
            $(this.$el)
                .select2({ data: this.options, width: '100%' })
                .val(this.selected).trigger('change')
                .on('select2:select', this.change);
        },
        destroyed() {
            $(this.$el).off().select2('destroy');
        }
    }
</script>