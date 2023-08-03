<template>
    <div class="panel-wrapper" :style="'margin: ' + contents.margin + '; padding: ' + contents.padding + ';'">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">{{ contents.title }}</h3>
            </div>
            <div class="panel-body">{{ contents.content }}</div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            contents: {
                required: true,
            }
        }
    }
</script>