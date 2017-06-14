<template>
    <form @submit.prevent="submit" class="form-horizontal" role="form" :action="action" :method="method">
        <div class="form-group" data-validate="first_name">
            <label for="first-name" class="col-md-4 control-label">Имя</label>
            <div class="col-md-6">
                <input v-model="firstName" id="first-name" type="text"
                       class="form-control" name="first_name">
            </div>
        </div>
        <div class="form-group" data-validate="last_name">
            <label for="last-name" class="col-md-4 control-label">Фамилия</label>
            <div class="col-md-6">
                <input v-model="lastName" id="last-name" type="text"
                       class="form-control" name="last_name">
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-8 col-md-offset-4">
                <button type="submit" class="btn btn-primary"
                        :disabled="sending">Сохранить</button>
                <a href="#" class="btn btn-default go-back">Назад</a>
            </div>
        </div>
    </form>
</template>

<script>
    export default {
        data() {
            return {
                firstName: "",
                lastName: "",
                sending: false
            }
        },
        props: {
            action: {
                type: String,
                required: true
            },
            method: {
                type: String,
                required: true
            },
            dataset: String
        },
        methods: {
            /**
             * Пакуем форму в FormData и добавляем _method
             * _method нужен для запросов типа PUT (обновление)
             */
            submit(event) {
                let data = new FormData(event.target);
                data.append("_method", this.method);

                this.store( data );
                this.sending = true;
            },
            /**
             * Сохраняем запись
             */
            store(data) {
                this.$http.post(this.action, data).then(() => {
                    window.location.assign("/admin/car/owners");
                    this.sending = false;
                }).catch((error) => {
                    this.$notify("Ошибка сохранения", "error");
                    this.sending = false;
                });
            }
        },
        mounted() {
            if (this.dataset !== undefined) {
                let data = JSON.parse(this.dataset);
                this.firstName = data['first_name'];
                this.lastName  = data['last_name'];
            }
        }
    }
</script>