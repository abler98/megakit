<template>
    <table v-if="owners.length > 0" class="table table-bordered table-hover">
        <thead>
        <tr>
            <td width="1%">#</td>
            <td>Имя</td>
            <td>Фамилия</td>
            <td>Управление</td>
        </tr>
        </thead>
        <tbody>
        <tr v-for="owner in owners">
            <td>{{ owner.id }}</td>
            <td>{{ owner.first_name }}</td>
            <td>{{ owner.last_name }}</td>
            <td>
                <a @click.prevent="edit(owner.id)" href="#" class="btn btn-default">
                    <span class="fa fa-edit"></span> Изменить
                </a>
                <a @click.prevent="destroy(owner.id)" href="#" class="btn btn-default">
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
        Нет владельцев в базе данных
    </div>
</template>

<script>
    export default {
        data() {
            return {
                loading: true,
                owners: [],
            }
        },
        methods: {
            requestData() {
                this.$http.get("/api/car/owners").then((response) => {
                    this.owners = response.data;
                    this.loading = false;
                }).catch((error) => {
                    this.loading = false;
                    console.log(error);
                });
            },
            watchData() {
                // Можно использовать Laravel Echo для обновления списка
            },
            edit(id) {
                let url = "/admin/car/owners/" + id + "/edit";
                location.assign(url);
            },
            destroy(id) {
                this.$http.delete("/api/car/owners/" + id).then(() => {
                    this.owners.forEach((owner, index) => {
                        if (owner.id === id) {
                            this.owners.splice(index, 1);
                            return false;
                        }
                    });
                    this.$notify("Владелец удалён");
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