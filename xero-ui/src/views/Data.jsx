
import React from "react";
import gql from 'graphql-tag';
import { useQuery } from '@apollo/react-hooks';

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


// For Accounts
/* GraphQL begin */
const ACCOUNTS_QUERY = gql`
  {
    accounts {
      Code
      Name
      Type
      Status
      SavedAt
    }
  }`;

const VENDORS_QUERY = gql`
{
  vendors {
    Name
    EmailAddress
    ContactStatus
    IsSupplier
    SavedAt
  }
}`;

function AccountList() {
  const { loading, error, data } = useQuery(ACCOUNTS_QUERY);

  if (loading) return (<tr><td colSpan="5" className="text-center">Loading data...</td></tr>);
  if (error) return (<tr><td colSpan="5" className="text-center">Error! ${error.message}</td></tr>);

  return (
    data.accounts.map(it => (
      <tr>
        <td className="text-center">{it.Code}</td>
        <td>{it.Name}</td>
        <td className="text-center">{it.Type}</td>
        <td className="text-center">{it.Status}</td>
        <td className="text-center">{it.SavedAt}</td>
      </tr>
    ))
  );
}

function VendorList() {
  const { loading, error, data } = useQuery(VENDORS_QUERY);

  if (loading) return (<tr><td colSpan="5" className="text-center">Loading data...</td></tr>);
  if (error) return (<tr><td colSpan="5" className="text-center">Error! ${error.message}</td></tr>);

  return (
    data.vendors.map(it => (
      <tr>
        <td>{it.Name}</td>
        <td>{it.EmailAddress}</td>
        <td className="text-center">{it.Status}</td>
        <td className="text-center">{it.IsSupplier}</td>
        <td className="text-center">{it.SavedAt}</td>
      </tr>
    ))
  );
}

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
                      <AccountList />                      
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
                      <VendorList />
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
