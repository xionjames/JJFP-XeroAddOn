/**
 * 
 */

import Processes from "views/Processes.jsx";
import DataList from "views/Data.jsx";

var routes = [  
  {
    path: "/data",
    name: "Data Lists",
    icon: "nc-icon nc-tile-56",
    component: DataList,
    layout: "/admin"
  },
  {
    path: "/processes",
    name: "Sync Processes",
    icon: "fas fa-sync-alt",
    component: Processes,
    layout: "/admin"
  }
];
export default routes;
