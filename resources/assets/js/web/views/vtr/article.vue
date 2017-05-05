<template>
    <section>
        <!--工具条-->
        <el-col :span="24" class="toolbar" style="padding-bottom: 0px;">
            <el-form :inline="true" :model="filters">
                <el-form-item>
                    <el-input v-model="filters.title" placeholder="标题"></el-input>
                </el-form-item>
                <el-form-item>
                    <el-button type="primary" v-on:click="getUsers">查询</el-button>
                </el-form-item>
                <el-form-item>
                    <el-button type="primary" @click="handleAdd">新增</el-button>
                </el-form-item>
            </el-form>
        </el-col>

        <!--列表-->
        <el-table :data="tableData" highlight-current-row v-loading="listLoading" @selection-change="selsChange"
                  style="width: 100%;">
            <el-table-column type="selection">
            </el-table-column>
            <el-table-column prop="id" label="ID" sortable>
            </el-table-column>
            <el-table-column prop="user_name" label="姓名">
            </el-table-column>
            <el-table-column prop="title" label="标题">
            </el-table-column>
            <el-table-column prop="created_at" label="创建时间" sortable>
            </el-table-column>
            <el-table-column label="操作" width="150">
                <template scope="scope">
                    <el-button size="small" @click="handleEdit(scope.$index, scope.row)">编辑</el-button>
                    <el-button type="danger" size="small" @click="handleDel(scope.$index, scope.row)">删除</el-button>
                </template>
            </el-table-column>
        </el-table>

        <!--工具条-->
        <el-col :span="24" class="toolbar">
            <el-button type="danger" @click="batchRemove" :disabled="this.sels.length===0">批量删除</el-button>
            <el-pagination layout="prev, pager, next" @current-change="handleCurrentChange" :page-size="20"
                           :total="total" style="float:right;">
            </el-pagination>
        </el-col>

        <!--编辑界面-->
        <el-dialog title="编辑" v-model="editFormVisible" :close-on-click-modal="false">
            <el-form :model="editForm" label-width="80px" :rules="editFormRules" ref="editForm">
                <el-form-item label="ID" prop="id">
                    <el-input v-model="editForm.id" disabled></el-input>
                </el-form-item>
                <el-form-item label="姓名" prop="user_name">
                    <el-input v-model="editForm.user_name" auto-complete="off"></el-input>
                </el-form-item>
                <el-form-item label="标题" prop="title">
                    <el-input v-model="editForm.title" auto-complete="off"></el-input>
                </el-form-item>
            </el-form>
            <div slot="footer" class="dialog-footer">
                <el-button @click.native="editFormVisible = false">取消</el-button>
                <el-button type="primary" @click.native="editSubmit" :loading="editLoading">提交</el-button>
            </div>
        </el-dialog>

        <!--新增界面-->
        <el-dialog title="新增" v-model="addFormVisible" :close-on-click-modal="false">
            <el-form :model="addForm" label-width="80px" :rules="addFormRules" ref="addForm">
                <el-form-item label="姓名" prop="user_name" placeholder="请输入姓名">
                    <el-input v-model="addForm.user_name" auto-complete="off"></el-input>
                </el-form-item>
                <el-form-item label="标题" prop="title" placeholder="请输入标题">
                    <el-input v-model="addForm.title" auto-complete="off"></el-input>
                </el-form-item>
            </el-form>
            <div slot="footer" class="dialog-footer">
                <el-button @click.native="addFormVisible = false">取消</el-button>
                <el-button type="primary" @click.native="addSubmit" :loading="addLoading">提交</el-button>
            </div>
        </el-dialog>
    </section>
</template>

<script type="text/ecmascript-6">
    export default {
        data() {
            return {
                filters: {
                    title: ''
                },
                tableData: [],
                listLoading: false,
                sels: [],//列表选中列
                total: 0,//分页
                page: 1,

                editFormVisible: false,//编辑界面是否显示
                editLoading: false,
                editFormRules: {
                    user_name: [
                        {required: true, message: '请输入姓名', trigger: 'blur'},
                        {max: 20, message: '长度小于20', trigger: 'blur'}
                    ],
                    title: [
                        {required: true, message: '请输入标题', trigger: 'blur'},
                        {min: 3, max: 200, message: '长度在2-200之间', trigger: 'blur'}
                    ]
                },
                //编辑界面数据
                editForm: {
                    id: '',
                    user_name: '',
                    title: '',
                },

                addFormVisible: false,//新增界面是否显示
                addLoading: false,
                addFormRules: {
                    user_name: [
                        {required: true, message: '请输入姓名', trigger: 'blur'},
                        {max: 20, message: '长度小于20', trigger: 'blur'}
                    ],
                    title: [
                        {required: true, message: '请输入标题', trigger: 'blur'},
                        {min: 3, max: 200, message: '长度在2-200之间', trigger: 'blur'}
                    ]
                },
                //新增界面数据
                addForm: {
                    user_name: '',
                    title: '',
                }
            }
        },
        methods: {
            //获取列表
            getUsers(){
                let para = {
                    page: this.page,
                    title: this.filters.title
                };
                this.listLoading = true;
                //NProgress.start();
                axios.get('/api/articles', {
                    params: para
                }).then(res => {
                    this.total = res.data.total;
                    this.tableData = res.data.data;
                    this.listLoading = false;
                    //NProgress.done();
                })
            },
            //分页
            handleCurrentChange(val) {
                this.page = val;
                this.getUsers();
            },
            //选择项变化触发事件
            selsChange: function (sels) {
                this.sels = sels;
            },
            //显示编辑界面
            handleEdit: function (index, row) {
                this.editFormVisible = true;
                this.editForm = Object.assign({}, row);
            },
            //显示新增界面
            handleAdd: function () {
                this.addFormVisible = true;
                this.addForm = {
                    user_name: '',
                    title: '',
                };
            },
            //删除
            handleDel: function (index, row) {
                this.$confirm('确认删除该记录吗?', '提示', {
                    type: 'warning'
                }).then(() => {
                    this.listLoading = true;
                    //NProgress.start();
                    axios.delete('/api/articles/' + row.id).then((res) => {
                        this.listLoading = false;
                        //NProgress.done();
                        this.$message({
                            message: '删除成功',
                            type: 'success'
                        });
                        this.getUsers();
                    });
                }).catch(() => {

                });
            },
            //编辑
            editSubmit: function () {
                this.$refs.editForm.validate((valid) => {
                    if (valid) {
                        this.editLoading = true;
                        //NProgress.start();
                        let para = Object.assign({}, this.editForm);
                        let self = this;
                        axios.put('/api/articles/' + this.editForm.id, para).then((res) => {
                            self.editLoading = false;
                            //NProgress.done();
                            self.$message({
                                message: '提交成功',
                                type: 'success'
                            });
                            self.$refs['editForm'].resetFields();
                            self.editFormVisible = false;
                            self.getUsers();
                        });
                    }
                });
            },
            //新增
            addSubmit: function () {
                this.$refs.addForm.validate((valid) => {
                    if (valid) {
                        this.addLoading = true;
                        //NProgress.start();
                        let para = Object.assign({}, this.addForm);
                        let self = this;
                        axios.post('/api/articles', para).then((res) => {
                            self.addLoading = false;
                            //NProgress.done();
                            self.$message({
                                message: '提交成功',
                                type: 'success'
                            });
                            self.$refs['addForm'].resetFields();
                            self.addFormVisible = false;
                            self.getUsers();
                        });
                    }
                });
            },
            selsChange: function (sels) {
                this.sels = sels;
            },
            //批量删除
            batchRemove: function () {
                var ids = this.sels.map(item => item.id);
                this.$confirm('确认删除选中记录吗？', '提示', {
                    type: 'warning'
                }).then(() => {
                    this.listLoading = true;
                    //NProgress.start();
                    let para = {ids: ids};
                    axios.post('/api/articles/batch',para).then((res) => {
                        this.listLoading = false;
                        //NProgress.done();
                        this.$message({
                            message: '删除成功',
                            type: 'success'
                        });
                        this.getUsers();
                    });
                }).catch(() => {

                });
            }
        },
        mounted() {
            this.getUsers();
        }
    }
</script>
