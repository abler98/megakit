<template>
    <form @submit.prevent="submit" class="form-horizontal" role="form" :action="action" :method="method">
        <div class="form-group" data-validate="owner">
            <label class="col-md-4 control-label">Владелец</label>
            <div class="col-md-6">
                <select2 :on-change="onChangeOwner()" name="owner"
                         :options="owners" :selected="owner.id">
                    <option selected disabled></option>
                    <option value="add">Добавить владельца</option>
                </select2>
            </div>
        </div>
        <div class="form-group" data-validate="car.brand">
            <label for="car-brand" class="col-md-4 control-label">Марка</label>
            <div class="col-md-6">
                <input v-model="car.brand" id="car-brand" type="text"
                       class="form-control" name="car[brand]">
            </div>
        </div>
        <div class="form-group" data-validate="car.model">
            <label for="car-model" class="col-md-4 control-label">Модель</label>
            <div class="col-md-6">
                <input v-model="car.model" id="car-model" type="text"
                       class="form-control" name="car[model]">
            </div>
        </div>
        <div class="form-group" data-validate="car.price">
            <label for="car-price" class="col-md-4 control-label">Цена</label>
            <div class="col-md-6">
                <div class="input-group">
                    <input v-model="car.price" id="car-price" type="text"
                           class="form-control" name="car[price]">
                    <span class="input-group-addon"><i class="fa fa-usd"></i></span>
                </div>
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
                car: {
                    brand: "",
                    model: "",
                    price: null,
                },
                owner: {
                    //
                },
                owners: [],
                sending: false,
                errors: [],
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
                    location.assign("/admin/cars");
                    this.sending = false;
                }).catch((error) => {
                    this.$notify("Ошибка сохранения", "error");
                    this.sending = false;
                });
            },
            /**
             * Получаем список всех владельцев
             */
            requestOwners() {
                this.$http.get("/api/car/owners").then((response) => {
                    this.owners = response.data.map((owner) => {
                        return {
                            text: owner['full_name'] + " (#" + owner.id + ")",
                            id: owner.id,
                        }
                    });
                });
            },
            /**
             * Открываем ссылку в новом окне при выборе "Добавить владельца"
             */
            onChangeOwner() {
                return (event, selected, prevent) => {
                    if (selected === "add") {
                        window.open("/admin/car/owners/create");
                        prevent();
                    }
                };
            }
        },
        components: {
            select2: require('../../common/Select2.vue')
        },
        /**
         * Устанавливаем значения по умолчанию
         */
        created() {
            if (this.dataset !== undefined) {
                this.car = JSON.parse(this.dataset);
                this.owner = this.car.owner || {};
            }
            this.requestOwners();
        }
    }
</script>