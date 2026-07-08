<v-charts-doughnut <?php echo e($attributes); ?>></v-charts-doughnut>

<?php if (! $__env->hasRenderedOnce('39d6e7a6-1ea5-4062-9cb0-338c5416a1b6')): $__env->markAsRenderedOnce('39d6e7a6-1ea5-4062-9cb0-338c5416a1b6');
$__env->startPush('scripts'); ?>
    <!-- SEO Vue Component Template -->
    <script
        type="text/x-template"
        id="v-charts-doughnut-template"
    >
        <canvas
            :id="$.uid + '_chart'"
            class="flex w-full max-w-full items-end"
        ></canvas>
    </script>

    <script type="module">
        app.component('v-charts-doughnut', {
            template: '#v-charts-doughnut-template',

            props: {
                labels: {
                    type: Array, 
                    default: [],
                },

                datasets: {
                    type: Array, 
                    default: true,
                },
            },

            data() {
                return {
                    chart: undefined,
                }
            },

            mounted() {
                this.prepare();
            },

            methods: {
                prepare() {
                    if (this.chart) {
                        this.chart.destroy();
                    }

                    this.chart = new Chart(document.getElementById(this.$.uid + '_chart'), {
                        type: 'doughnut',
                        
                        data: {
                            labels: this.labels,

                            datasets: this.datasets,
                        },
                
                        options: {
                            plugins: {
                                legend: {
                                    display: false
                                },
                            },
                        }
                    });
                }
            }
        });
    </script>
<?php $__env->stopPush(); endif; ?>
<?php /**PATH D:\XAMPP_Install\htdocs\crm_modules_final\packages\Webkul\Admin\src/resources/views/components/charts/doughnut.blade.php ENDPATH**/ ?>