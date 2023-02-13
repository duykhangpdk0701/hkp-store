import { useQuery } from "@tanstack/react-query";
import { Form, FormInstance, Input } from "antd";
import React, { FC, useState, useEffect } from "react";
import addressApi from "../../Api/addressApi";
import AddressOptionListAdd from "../AddressOptionListAdd";

interface IAddAddress {
  onFinish?: (values: any) => void;
  form: FormInstance<any>;
}

const AddAddress: FC<IAddAddress> = (props) => {
  const { onFinish, form } = props;

  const [cityValue, setCityValue] = useState<number>();
  const [districtValue, setDistrictValue] = useState<number>();

  const [wardValue, setWardValue] = useState<number>();

  const { data: cityList, isLoading: isCityLoading } = useQuery(
    ["cities"],
    addressApi.getListCity
  );

  const {
    data: districtList,
    refetch: districtRefetch,
    isLoading: isDistrictsLoading,
  } = useQuery(
    ["district"],
    () => {
      return addressApi.getListDistrict(cityValue);
    },
    {
      enabled: false,
    }
  );

  const {
    data: wardList,
    refetch: wardRefetch,
    isLoading: isWardsLoading,
  } = useQuery(["wards"], () => addressApi.getListWard(districtValue), {
    enabled: false,
  });

  useEffect(() => {
    const fetchProvide = async () => {
      if (cityValue) {
        await districtRefetch();
      }
    };
    fetchProvide();
  }, [cityValue, districtRefetch]);

  useEffect(() => {
    const fetchWards = async () => {
      if (districtValue) {
        await wardRefetch();
      }
    };

    fetchWards();
  }, [districtValue, wardRefetch]);

  const handleOnChangeProvinceSelect = (value: number) => {
    setCityValue(value);
    setDistrictValue(undefined);
    setWardValue(undefined);
    form.setFieldValue("district", undefined);
    form.setFieldValue("ward", undefined);
  };

  const handleOnChangeDistrictSelect = (value: number) => {
    setDistrictValue(value);
    setWardValue(undefined);
    form.setFieldValue("ward", undefined);
  };

  const handleOnChangeWardSelect = (value: number) => {
    setWardValue(value);
  };

  return (
    <div>
      <Form form={form} onFinish={onFinish} layout="vertical">
        <Form.Item name="name" label="Tên">
          <Input placeholder="Nguyễn Văn A" />
        </Form.Item>

        <Form.Item name="address" label="Địa chỉ">
          <Input placeholder="1 An Dương Vương" />
        </Form.Item>

        <Form.Item name="city" label="Chọn tỉnh">
          <AddressOptionListAdd
            value={cityValue?.toString()}
            listData={cityList}
            onChangeTermValue={handleOnChangeProvinceSelect}
            className="w-full"
            placeholder="Select an District"
            isLoading={isCityLoading}
          />
        </Form.Item>

        <Form.Item name="district" label="Chọn thành quận, xã">
          <AddressOptionListAdd
            disable={cityValue ? false : true}
            value={districtValue?.toString()}
            listData={districtList}
            onChangeTermValue={handleOnChangeDistrictSelect}
            className="w-full"
            placeholder="Select an District"
            isLoading={isDistrictsLoading}
          />
        </Form.Item>

        <Form.Item name="ward" label="Chọn phường">
          <AddressOptionListAdd
            disable={districtValue ? false : true}
            value={wardValue?.toString()}
            listData={wardList}
            onChangeTermValue={handleOnChangeWardSelect}
            className="w-full"
            placeholder="Select a Ward"
            isLoading={isWardsLoading}
          />
        </Form.Item>
      </Form>
    </div>
  );
};

export default AddAddress;
