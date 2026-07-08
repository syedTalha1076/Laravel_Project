<v-charts-bar <?php echo e($attributes); ?>></v-charts-bar>

<?php if (! $__env->hasRenderedOnce('0b6ff490-7b8b-4175-a0f2-498983ffd8eb')): $__env->markAsRenderedOnce('0b6ff490-7b8b-4175-a0f2-498983ffd8eb');
$__env->startPush('scripts'); ?>
    <!-- SEO Vue Component Template -->
    <script
        type="text/x-template"
        id="v-charts-bar-template"
    >
        <canvas
            :id="$.uid + '_chart'"
            class="flex w-full max-w-full items-end"
            :style="'aspect-ratio:' + aspectRatio + '/1'"
            style=""
        ></canvas>
    </script>

    <script type="module">
        app.component('v-charts-bar', {
            template: '#v-charts-bar-template',

            props: {
                labels: {
                    type: Array,
                    default: [],
                },

                datasets: {
                    type: Array,
                    default: [],
                },

                aspectRatio: {
                    type: Number,
                    default: 3.23,
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
                    const barCount = this.datasets.length;
                    
                    this.datasets.forEach((dataset) => {
                        dataset.barThickness = Math.max(4, 36 / barCount);
                    });
        
                    if (this.chart) {
                        this.chart.destroy();
                    }

                    this.chart = new Chart(document.getElementById(this.$.uid + '_chart'), {
                        type: 'bar',
                        
                        data: {
                            labels: this.labels,

                            datasets: this.datasets,
                        },

                        options: {
                            aspectRatio: this.aspectRatio,
                            
                            plugins: {
                                legend: {
                                    display: false
                                },
                            },
                            
                            scales: {
                                x: {
                                    beginAtZero: true,

                                    border: {
                                        dash: [8, 4],
                                    }
                                },

                                y: {
                                    beginAtZero: true,
                                    border: {
                                        dash: [8, 4],
                                    }
                                }
                            }
                        }
                    });
                }
            }
        });
    </script>
<?php $__env->stopPush(); endif; ?>
<?php /**PATH D:\XAMPP_Install\htdocs\crm_modules_final\packages\Webkul\Admin\src/resources/views/components/charts/bar.blade.php ENDPATH**/ ?>