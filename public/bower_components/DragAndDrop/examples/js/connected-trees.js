(function () {
    'use strict';

    angular.module('dragAndDrop', ['ui.tree', 'ngRoute', 'ui.bootstrap'], function ($interpolateProvider) {
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
    })

        .controller('ConnectedTreesCtrl', ['$scope', '$http', '$timeout', function ($scope, $http, $timeout) {

            //add by robin
            //laravel and angular connecting functions
            $scope.pages = [];
            $scope.message = '';
            $scope.messageSuccess = false;
            loadingClass(true);

            $scope.init = function (id) {
                $scope.menuId = id;
                $scope.changeData = false;
                $http.get('/admin/api/page/' + id).success(function (data, status, headers, config) {
                    if (data.pages.length <= 1) {
                        $scope.tree1 = addOrRemoveNodesInArray(data.pages);
                    } else {
                        $scope.tree1 = getNestedChildren(data.pages, "0");
                    }
                    $scope.tree2 = addOrRemoveNodesInArray(data.all);
                    loadingClass(false);
                });
            }

            $scope.updateData = function (getMenuId, data) {
                loadingClass(true);
                $http.post('/admin/api/page/' + getMenuId, {
                    data: data
                }).success(function (data, status, headers, config) {
                    $scope.page = [];
                    if (data == 'success') {
                        $scope.message = 'Pages are successfully arranged';
                        $scope.messageSuccess = true;
                    } else {
                        $scope.message = 'Error while arranging pages';
                    }
                    $scope.init(getMenuId);
                    loadingClass(false);
                });

                //message timeout
                messageTimeOut();
            };

            //updates data when dragged like parentId menuId sortId etc
            $scope.updateNew = function (node, parent_id, menu_id, sort_id) {
                $scope.changeData = true;
                node.parent_id = parent_id;
                node.menu_id = menu_id;
                node.sort_order = sort_id;
                node.page_id = node.id;
            }


            // enables or disables the page
            $scope.enableDisablePage = function (getMenuId, id, pivot_status) {
                $scope.messageSuccess = false;
                if (angular.isUndefined(id) || $scope.changeData == true) {
                    $scope.message = 'Please update pages before enable or disable page';
                } else {
                    $http.post('/admin/api/page/enableOrDisablePage/' + id, {
                        status: pivot_status
                    }).success(function (data, status, headers, config) {
                        $scope.page = [];
                        if (data == 'success') {
                            $scope.message = 'Page Successfully ' + ((pivot_status == 1) ? 'Disabled.' : 'Enabled.');
                            $scope.messageSuccess = true;
                        } else {
                            $scope.message = 'Error while ' + ((pivot_status == 1) ? 'Disable.' : 'Enable.');
                        }
                        $scope.init(getMenuId);
                        loadingClass(false);
                    });
                }
                //message timeout
                messageTimeOut();
            }

            // update title of the page
            $scope.updatePageDetails = function (getMenuId, id, pivot_title) {
                $scope.messageSuccess = false;
                if (angular.isUndefined(id) || $scope.changeData == true) {
                    $scope.message = 'Please update pages before title update';
                } else {
                    $http.post('/admin/api/page/updatePageDetails/' + id, {
                        title: pivot_title
                    }).success(function (data, status, headers, config) {
                        $scope.page = [];
                        if (data == 'success') {
                            $scope.message = 'Page title successfully updated.';
                            $scope.messageSuccess = true;
                        } else {
                            $scope.message = 'Error while page title update.';
                        }
                        $scope.init(getMenuId);
                        loadingClass(false);
                    });
                }
                //message timeout
                messageTimeOut();
            }

            $scope.updateModalFormDetail = function (node) {
                $scope.messageSuccess = false;
                if (angular.isUndefined(node.pivot_id) || $scope.changeData == true) {
                    $scope.message = 'Please update pages before title update';
                } else {
                    $('.modal_page').modal('show');
                    $scope.pages = node;
                }
            }


            // converts plain array to nested array for parent and child
            function getNestedChildren(arr, parent) {
                var out = []
                for (var i in arr) {
                    if (arr[i].pivot.parent_id == parent) {
                        var children = getNestedChildren(arr, arr[i].id)

                        arr[i].parent_id = arr[i].pivot.parent_id;
                        arr[i].menu_id = arr[i].pivot.menu_id;
                        arr[i].sort_order = arr[i].pivot.sort_order;
                        arr[i].page_id = arr[i].pivot.page_id;
                        arr[i].page_title = arr[i].pivot.title;
                        arr[i].page_status = arr[i].pivot.status;
                        arr[i].pivot_id = arr[i].pivot.pivot_id;
                        arr[i].pivot = "";

                        if (children.length) {
                            arr[i].nodes = children
                        } else {
                            arr[i].nodes = []
                        }
                        out.push(arr[i])
                    }
                }
                return out
            }


            // add or remove nodes = [] in array imp for drag and drop
            function addOrRemoveNodesInArray(arr) {
                var out = []
                for (var i in arr) {
                    arr[i].nodes = [];
                    // condition with pivot_id
                    if (arr[i].pivot) {
                        arr[i].parent_id = arr[i].pivot.parent_id;
                        arr[i].menu_id = arr[i].pivot.menu_id;
                        arr[i].sort_order = arr[i].pivot.sort_order;
                        arr[i].page_id = arr[i].pivot.page_id;
                        arr[i].page_title = arr[i].pivot.title;
                        arr[i].page_status = arr[i].pivot.status;
                        arr[i].pivot_id = arr[i].pivot.pivot_id;
                        arr[i].pivot = "";
                    }
                    out.push(arr[i])
                }
                return out
            }

            $scope.getParentId = function (id) {
                $scope.formMethod = '';
                $scope.page = [];
                $scope.page.parent_id = id;
            }
            $scope.getFullData = function (node) {
                $scope.formMethod = 'edit';
                $scope.page = node;
            }

            function loadingClass(loading) {
                var selectDiv = $('div.pace.pace-inactive');
                if (loading == true) {
                    selectDiv.css('display', 'block');
                } else {
                    selectDiv.css('display', 'none');
                }
            }

            function messageTimeOut() {
                $timeout(function () {
                    $scope.message = '';
                }, 5000);
            }

        }]);
}());