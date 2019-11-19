
import React from "react";

// reactstrap components
import {
  Card,
  CardHeader,
  CardBody,
  CardTitle,
  Table,
  Row,
  Col
} from "reactstrap";

class Processes extends React.Component {
  render() {
    return (
      <>
        <div className="content">
          <Row>
            <Col md="6">
              <Card>
                <CardHeader>
                  <CardTitle tag="h4">Sync Processes</CardTitle>
                  <p className="card-category">
                    Sync data with Xero
                  </p>
                </CardHeader>
                <CardBody>
                  <Table responsive>
                    <thead className="text-primary">
                      <tr>
                        <th className="text-center">Type</th>
                        <th className="text-center">Started At</th>
                        <th className="text-center">Status</th>
                        <th className="text-center">Finished At</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td className="text-center"><i class="fa fa-download" title="Fetch" /></td>
                        <td className="text-center">2019-11-16T00:15:59</td>
                        <td className="text-center"><i class="fa fa-check ok" /></td>
                        <td className="text-center">2019-11-16T00:16:00</td>
                      </tr>
                      <tr>
                        <td className="text-center"><i class="fa fa-download" title="Fetch" /></td>
                        <td className="text-center">2019-11-16T00:15:59</td>
                        <td className="text-center"><i class="fa fa-times fail" /></td>
                        <td className="text-center">2019-11-16T00:16:00</td>
                      </tr>
                      <tr>
                        <td className="text-center"><i class="fa fa-download" title="Fetch" /></td>
                        <td className="text-center">2019-11-16T00:15:59</td>
                        <td className="text-center"><i class="fa fa-check ok" /></td>
                        <td className="text-center">2019-11-16T00:16:00</td>
                      </tr>
                    </tbody>
                  </Table>
                </CardBody>
              </Card>
            </Col>
            <Col md="6">
              <Card>
                <CardHeader>
                  <CardTitle tag="h4">Process Log</CardTitle>
                  <p className="card-category">
                    Execution Details for Process
                  </p>
                </CardHeader>
                <CardBody>
                  <Table responsive>
                    <thead className="text-primary">
                      <tr>
                        <th>Action</th>
                        <th className="text-center">Status</th>
                        <th className="text-center">Updated At</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Fecth operation started</td>
                        <td className="text-center"><i class="fa fa-check ok" /></td>
                        <td className="text-center">2019-11-16T18:03:41</td>
                      </tr>
                      <tr>
                        <td>Retrieving Contacts</td>
                        <td className="text-center"><i class="fa fa-check ok" /></td>
                        <td className="text-center">2019-11-16T18:03:41</td>
                      </tr>
                      <tr>
                        <td>Saving Vendors</td>
                        <td className="text-center"><i class="fa fa-check ok" /></td>
                        <td className="text-center">2019-11-16T18:03:41</td>
                      </tr>
                      <tr>
                        <td>Retrieving Accounts<br /><small>58 records</small></td>
                        <td className="text-center"><i class="fa fa-check ok" /></td>
                        <td className="text-center">2019-11-16T18:03:41</td>
                      </tr>
                      <tr>
                        <td>Saving Accounts<br /><small>10 inserted, 48 modified</small></td>
                        <td className="text-center"><i class="fa fa-check ok" /></td>
                        <td className="text-center">2019-11-16T18:03:41</td>
                      </tr>
                      <tr>
                        <td>Fetch operation finished</td>
                        <td className="text-center"><i class="fa fa-check ok" /></td>
                        <td className="text-center">2019-11-16T18:03:41</td>
                      </tr>
                    </tbody>
                  </Table>
                </CardBody>
              </Card>
            </Col>
          </Row>
        </div>
      </>
    );
  }
}

export default Processes;
