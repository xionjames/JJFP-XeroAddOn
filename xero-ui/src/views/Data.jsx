
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

class Data extends React.Component {
  render() {
    return (
      <>
        <div className="content">
          <Row>
            <Col md="12">
              <Card>
                <CardHeader>
                  <CardTitle tag="h4">Accounts</CardTitle>
                  <p className="card-category">
                    Available Account in Xero
                  </p>
                </CardHeader>
                <CardBody>
                  <Table responsive>
                    <thead className="text-primary">
                      <tr>
                        <th className="text-center">Code</th>
                        <th>Name</th>
                        <th className="text-center">Type</th>
                        <th className="text-center">Status</th>
                        <th className="text-center">Updated At</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td className="text-center">970</td>
                        <td>Owner A Share Capital</td>
                        <td className="text-center">EQUITY</td>
                        <td className="text-center">ACTIVE</td>
                        <td className="text-center">2019-11-16T00:15:59</td>
                      </tr>
                      <tr>
                        <td className="text-center">473</td>
                        <td>Repairs and Maintenance</td>
                        <td className="text-center">EXPENSE</td>
                        <td className="text-center">ACTIVE</td>
                        <td className="text-center">2019-11-16T00:15:59</td>
                      </tr>
                      <tr>
                        <td className="text-center">300</td>
                        <td>Purchases</td>
                        <td className="text-center">EXPENSE</td>
                        <td className="text-center">ACTIVE</td>
                        <td className="text-center">2019-11-16T00:15:59</td>
                      </tr>
                    </tbody>
                  </Table>
                </CardBody>
              </Card>
            </Col>
            <Col md="12">
              <Card>
                <CardHeader>
                  <CardTitle tag="h4">Vendors</CardTitle>
                  <p className="card-category">
                    Contacts from Xero
                  </p>
                </CardHeader>
                <CardBody>
                  <Table responsive>
                    <thead className="text-primary">
                      <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th className="text-center">Status</th>
                        <th className="text-center">Is Supplier</th>
                        <th className="text-center">Updated At</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Young Bros Transport</td>
                        <td>rog@ybt.co</td>
                        <td className="text-center">ACTIVE</td>
                        <td className="text-center">YES</td>
                        <td className="text-center">2019-11-16T18:03:41</td>
                      </tr>
                      <tr>
                        <td>Young Bros Transport</td>
                        <td>rog@ybt.co</td>
                        <td className="text-center">ACTIVE</td>
                        <td className="text-center">YES</td>
                        <td className="text-center">2019-11-16T18:03:41</td>
                      </tr>
                      <tr>
                        <td>Young Bros Transport</td>
                        <td>rog@ybt.co</td>
                        <td className="text-center">ACTIVE</td>
                        <td className="text-center">YES</td>
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

export default Data;
