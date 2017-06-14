<template>
    <table v-if="cars.length > 0" class="table table-bordered">
        <thead>
        <tr>
            <td width="1%">#</td>
            <td>Владелец</td>
            <td>Марка</td>
            <td>Модель</td>
            <td>Управление</td>
        </tr>
        </thead>
        <tbody>
        <tr v-for="car in cars">
            <td>{{ car.id }}</td>
            <td>
                <span v-if="car.owner">
                    {{ car.owner['full_name'] }}
                </span>
                <span v-else>
                    Нет владельца
                </span>
            </td>
            <td>{{ car.brand }}</td>
            <td>{{ car.model }}</td>
            <td>
                <a @click.prevent="edit(car.id)" href="#" class="btn btn-default">
                    <span class="fa fa-edit"></span> Изменить
                </a>
                <a @click.prevent="destroy(car.id)" href="#" class="btn btn-default">
                    <span class="fa fa-trash"></span> Удалить
                </a>
            </td>
        </tr>
        </tbody>
    </table>
    <div v-else-if="loading">
        Загрузка...
    </div>
    <div v-else>
        Нет автомобилей в базе данных
    </div>
</template>

<script>
    export default {
        data() {
            return {
                loading: true,
                cars: [],
            }
        },
        methods: {
            requestData() {
                this.$http.get("/api/cars").then((response) => {
                    this.cars = response.data;
                    this.loading = false;
                }).catch((error) => {
                    this.$notify("Ошибка получения данных", "error");
                    this.loading = false;
                });
            },
            watchData() {
                // Можно использовать Laravel Echo для обновления списка
            },
            edit(id) {
                let url = "/admin/cars/" + id + "/edit";
                location.assign(url);
            },
            destroy(id) {
                this.$http.delete("/api/cars/" + id).then(() => {
                    this.cars.forEach((car, index) => {
                        if (car.id === id) {
                            this.cars.splice(index, 1);
                            return false;
                        }
                    });
                    this.$notify("Автомобиль удалён");
                }).catch((error) => {
                    this.$notify("Ошибка удаления", "error");
                });
            }
        },
        created() {
            this.requestData();
            this.watchData();
        }
    }
</script>